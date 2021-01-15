<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $messageContent;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $email, string $messageContent)
    {
        $this->email = $email;
        $this->messageContent = $messageContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@website.com')->view('emails.feedbackmessage');
    }
}
