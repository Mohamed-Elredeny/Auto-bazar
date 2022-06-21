<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;
    public $emaill;
    public $messagee;
    public $subjecttt;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emaill,$subjecttt,$messagee)
    {
        $this->emaill = $emaill;
        $this->messagee = $messagee;
        $this->subjecttt = $subjecttt;
        $this->subject = $subjecttt;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contact');
    }
}
