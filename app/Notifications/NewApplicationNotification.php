<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewApplicationNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Application
     */
    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hi, Admin')
            ->line('New Application has been submitted.')
            ->line('Subject : ' . $this->application->subject)
            ->line('Message : ' . $this->application->message)
            ->line('User name : ' . $this->application->user->name)
            ->line('User email : ' . $this->application->user->email);
    }

}
