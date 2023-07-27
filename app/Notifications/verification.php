<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use NotificationChannels\Smspoh\SmspohMessage;
use Illuminate\Notifications\Notification;

class verification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        return ["smspoh"];
    }

    public function toSmspoh($notifiable)
    {

        return (new SmspohMessage)->content("Your account was approved!");
    }
}
