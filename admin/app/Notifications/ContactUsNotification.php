<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public array $data)
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
        $borderLength = isset($this->data['border_length']) ? $this->data['border_length'] : null;

        return (new MailMessage)
            ->subject('New Contact Us Form Submission')
            ->line('A new contact form has been submitted.')
            ->line('First Name: ' . $this->data['first_name'])
            ->line('Last Name: ' . $this->data['last_name'])
            ->line('Email: ' . $this->data['email'])
            ->line('Phone Number: ' . $this->data['phone_number'])
            ->line('Product Interest: ' . implode(', ', $this->data['product_interest']))
            ->line('Message: ' . $this->data['message'])
            ->line('Organization Name: ' . $this->data['organization_name'])
            ->line('Organization Type: ' . $this->data['organization_type'])
            ->lineIf(border_required($this->data['category']), "Border Length: {$borderLength} feets")
            ->line('Budget: $' . $this->data['budget']);
        // ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
