<?php

namespace App\Notifications\Comment;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentApproved extends Notification implements ShouldQueue
{
    use Queueable;

    private $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Comment Successfully Approved')
            ->greeting('Hello, ' . $this->comment->user->name . ' !')
            ->line('Your comment on <strong>' . $this->comment->post->user->name .
                '</strong> post, has been successfully approved.')
            ->line('<h3>' . $this->comment->post->title . '</h3>')
            ->line('<img src="' . $this->comment->post->imageUrl . '">')
            ->action('View', url($this->comment->post->viewLink))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
