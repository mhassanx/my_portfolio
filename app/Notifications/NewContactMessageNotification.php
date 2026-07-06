<?php

namespace App\Notifications;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactMessageNotification extends Notification
{
    use Queueable;

    public function __construct(public ContactMessage $contactMessage)
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New portfolio contact: '.$this->contactMessage->name)
            ->greeting('New contact form submission')
            ->line('Someone reached out through your portfolio contact form.')
            ->line('**Name:** '.$this->contactMessage->name)
            ->line('**Email:** '.$this->contactMessage->email)
            ->line('**Message:**')
            ->line($this->contactMessage->message)
            ->action('View in Admin', url('/admin/messages/'.$this->contactMessage->id))
            ->line('Reply directly to '.$this->contactMessage->email.' to respond.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'contact_message_id' => $this->contactMessage->id,
        ];
    }
}
