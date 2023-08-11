<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateBlog extends Notification
{
    use Queueable;
 private $post_id;
 private $user_create;
 private $title;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post_id,$user_create,$title)
    {
       $this->post_id=$post_id;
       $this->user_create=$user_create;
       $this->title=$title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
          'post_id'=> $this->post_id,
          'user_create'=>$this->user_create,
          'title'=>$this->title
        ];
    }
}
