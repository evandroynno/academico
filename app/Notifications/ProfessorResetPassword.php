<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ProfessorResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
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
			->subject('Redefinição de Senha')
			->greeting('Olá')
			->line('Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.')
			->action('Redefinir Senha', url('professor/password/reset', $this->token))
			->line('Se você não solicitou uma redefinição de senha, nenhuma ação adicional é necessária.');
    }
}
