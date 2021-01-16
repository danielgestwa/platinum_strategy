<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMessage extends Mailable
{
    /**
     * Mailable class for sending contact email
     */
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $messageContent;

    /**
     * Create a new message instance.
     *
     * @param string $email 
     * @param string $messageContent
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
     * @return \Illuminate\Http\Response
     */
    public function build()
    {
        return $this->from('no-reply@website.com')->view('emails.feedbackmessage');
    }
}
