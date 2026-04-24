<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ApplicationRejectedMail extends Mailable
{
    public $application;

    public function __construct($application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->subject('Application Status Update')
            ->view('emails.application-rejected');
    }
}