<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fullName;
    public $email;
    public $telephoneNumber;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullName, $email, $telephoneNumber, $content)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->telephoneNumber = $telephoneNumber;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("E-Mail ze strony " . config("app.name"))
            ->from($this->email, $this->fullName)
            ->replyTo($this->email, $this->fullName)
            ->text("main.mail_plain")
            ->view("main.mail");
    }
}
