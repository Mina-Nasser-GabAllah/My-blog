<?php

namespace App\Notifications;

use App\Lib\MsgContent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Msg extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $msg;
    public function __construct(MsgContent $msg)
    {
        $this->msg=$msg;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];

    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
            'email'=>$this->msg->email,
            'name'=>$this->msg->name,
            'phone'=>$this->msg->phone,
            'content'=>$this->msg->content,
        ];
    }
}
