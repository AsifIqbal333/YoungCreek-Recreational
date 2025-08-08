<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class OrderReceived extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $order)
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
            ->subject('New Order Received: #' . $this->order->id)
            ->greeting('Hello Admin!')
            ->line('A new order has been received.')
            ->line(new HtmlString('Order #: <strong>' . $this->order->id . '</strong>'))
            ->line(new HtmlString('Price: $<strong>' . number_format($this->order->price, 2) . '</strong>'))
            ->line(new HtmlString('Products: <strong>' . $this->order->products_count . '</strong>'))
            ->line(new HtmlString('Customer: <strong>' . $this->order->user->name . '</strong>'))
            ->line(new HtmlString('Email: <strong>' . $this->order->user->email . '</strong>'))
            ->line(new HtmlString('Date: <strong>' . $this->order->created_at->format('M d, Y H:i') . '</strong>'))
            ->action('View Order Details', route('admin.orders.show', $this->order));
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
