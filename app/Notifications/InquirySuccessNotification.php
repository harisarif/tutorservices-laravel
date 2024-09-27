<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InquirySuccessNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('New Inquiry Received')
        ->greeting('Hello Admin,')
        ->line('A new inquiry has been added:')
        ->line('Name: ' . $this->inquiry->name)
        ->line('Email: ' . $this->inquiry->email)
        ->line('Phone: ' . $this->inquiry->phone)
        ->action('View Inquiry', url('/inquiry/create' . $this->inquiry->id))
        ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'name' => $this->inquiry->name,
            'email' => $this->inquiry->email,
            'phone' => $this->inquiry->phone,
            'message' => 'A new inquiry has been added by ' . $this->inquiry->name,
        ];
    }
}
