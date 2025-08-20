<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

public $name;
public $password;
public $resetUrl;

public function __construct($name, $password, $resetUrl)
{
    $this->name = $name;
    $this->password = $password;
    $this->resetUrl = $resetUrl;
}

    public function build()
    {
        return $this->subject('Welcome to ' . config('app.name'))
                    ->view('emails.welcome'); // Blade file
    }
}
