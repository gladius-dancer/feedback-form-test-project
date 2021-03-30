<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackController extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function feedback_test()
    {
        $response = $this->post(route('feedbackSend'));

        $response->assertViewIs('index');
        $response->assertStatus(200);

    }
}
