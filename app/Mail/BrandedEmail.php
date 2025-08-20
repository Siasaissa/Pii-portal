<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BrandedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $greeting;
    public $introLines;
    public $actionText;
    public $actionUrl;
    public $outroLines;
    public $salutation;

    public function __construct($greeting, $introLines, $actionText, $actionUrl, $outroLines, $salutation = null)
    {
        $this->greeting = $greeting;
        $this->introLines = $introLines;
        $this->actionText = $actionText;
        $this->actionUrl = $actionUrl;
        $this->outroLines = $outroLines;
        $this->salutation = $salutation;
    }

    public function build()
    {
    return $this->subject($this->actionText ?? config('app.name'))
                ->view('emails.branded-email') // ✅ This sends HTML
                ->with([
                    'greeting'   => $this->greeting,
                    'introLines' => $this->introLines,
                    'actionText' => $this->actionText,
                    'actionUrl'  => $this->actionUrl,
                    'outroLines' => $this->outroLines,
                    'salutation' => $this->salutation,
                ]);// Link to the HTML template
    }
}
