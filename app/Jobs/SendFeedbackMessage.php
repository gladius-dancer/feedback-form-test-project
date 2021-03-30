<?php

namespace App\Jobs;

use App\Mail\SendMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendFeedbackMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mess;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mess)
    {
        $this->mess = $mess;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $toMail = "receiver@mail.domain";
        $mm = new SendMail($this->mess);
        Mail::to($toMail)->send($mm);
    }
}
