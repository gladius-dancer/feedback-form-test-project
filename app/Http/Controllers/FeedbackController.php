<?php

namespace App\Http\Controllers;

use App\Jobs\QueueSenderEmail;
use App\Jobs\SendFeedbackMail;
use App\Jobs\SendFeedbackMessage;
use App\Mail\SendMail;
use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    public function send(Request $request){

        $request->validate([
            'full_name' => 'required|string|min:5|max:40',
            'email' => 'required|email',
            'feedback_msg' => 'required|string|max:500',
        ]);

        $in = $request->all();

        $records= new Feedbacks();
        $records->full_name = $in['full_name'];
        $records->email = $in['email'];
        $records->feedback_msg = $in['feedback_msg'];
        $records->save();

        dispatch(new SendFeedbackMessage($in['feedback_msg']));
        Session::flash('message', 'Message sent.');
        return redirect()->back();

    }
}
