<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $subjectLine;
    public $htmlBody;

    public function __construct($otp, $subjectLine, $htmlBody)
    {
        $this->otp = $otp;
        $this->subjectLine = $subjectLine;
        $this->htmlBody = $htmlBody;
    }

    public function build()
    {
        return $this->from('noreply@edexceledu.com', 'Edexcel Academy')
                    ->subject($this->subject)
                    ->markdown('emails.verification')
                    ->with([
                        'otp' => $this->otp,
                    ]);
    }
}



