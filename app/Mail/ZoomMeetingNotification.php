<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ZoomMeetingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $meeting;

    public function __construct($user, $meeting)
    {
        $this->user = $user;
        $this->meeting = $meeting;
    }

    public function build()
    {
        return $this->subject('Zoom Meeting Invitation')
            ->view('emails.zoom_meeting');
    }
}
