<?php

namespace App\Notifications\service;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ServiceAdd extends Notification
{
    use Queueable;

     public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
       $this->users = $user;
       // $this->services = $service;
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
    public function toDatabase($notifiable)
    {
        return [

            'user_id'=>$this->users->id,
            'user_name'=>$this->users->name
            // 'service_id'=>$this->services->id,
            // 'service_name'=>$this->services->service_name
        ];
    }
}
