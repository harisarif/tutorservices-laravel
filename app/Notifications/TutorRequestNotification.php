<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TutorRequestNotification extends Notification
{
    use Queueable;

    protected $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    public function via(object $notifiable): array
    {
        return ['database']; // Only store notification in database
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'New Tutor Request',
            'message' => "{$this->student->name} has requested tutoring.",
            'student_id' => $this->student->id,
            'student_name' => $this->student->name,
            'student_email' => $this->student->email,
            'student_phone' => $this->student->phone ?? null,
            'type' => 'tutor_request',
            'created_at' => now(),
        ];
    }
}
