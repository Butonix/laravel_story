<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SupportMail extends Mailable
{
    use Queueable, SerializesModels;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        $address = 'support@janjaow.com';
//        $name = 'janjaow support.';
//        $subject = 'Forgot Password';
//        return $this->view('layouts.email.form_email')
//        ->from($address, $name)
//        ->cc($address, $name)
//        ->bcc($address, $name)
//        ->replyTo($address, $name)
//        ->subject($subject);
        return $this->from('support@janjaow.com')
            ->view('layouts.email.form_email')
            ->with('text', $this->message);
    }
}
