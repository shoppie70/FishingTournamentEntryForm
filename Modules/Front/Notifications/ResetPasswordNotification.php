<?php

namespace Modules\Front\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    private string $token;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(mixed $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(mixed $notifiable): MailMessage
    {
//        $url = urldecode(url('reset-password', $this->token . '?email=' . $notifiable->email));
        $url = route('user.password.reset', ['token' => $this->token . '?email=' . $notifiable->email]);

        return (new MailMessage())
            ->subject('【' . config('app.name') . '】パスワード再設定')
            ->markdown('front::email.password_reset', ['reset_url' => $url]);
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(mixed $notifiable): array
    {
        return [
        ];
    }
}
