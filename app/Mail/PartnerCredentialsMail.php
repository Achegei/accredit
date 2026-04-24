<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class PartnerCredentialsMail extends Mailable
{
    public $user;
    public $password;

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Your GESTAAC Partner Account')
            ->view('emails.partner-credentials');
    }
}