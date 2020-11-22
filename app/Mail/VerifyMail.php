<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $aluno;
    public $verifyAluno;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($aluno)
    {
        $this->aluno = $aluno;
		// $this->verifyAluno = $verifyAluno;
		switch($aluno['local']){
			case 'rio':
				$this->local = "<address>(21) 2516-5920<br>(21) 2516-5786<br>Av. Paulo de Frontin, 568 fundos – Rio Comprido<br>CEP 20261-243 Rio de Janeiro – RJ<br>contato@pisdc.org.br</address><br>";
				break;
			case 'londrina':
				$this->local = "<address>(43) 9921-2930<br>Rua Padre Rinaldo Semprebom, 137 - Tucano<br>CEP 86047-010 Londrina – PR<br>mestradodireitocanonico@gmail.com</address><br>";
				break;
			case 'goiania':
				$this->local = "<address>(62) 8259-2757<br>Av. Anápolis, 2020 - Jardim das Aroeiras<br>CEP 74770-440 Goiânia – GO</address><br>";
				break;
		};

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		return $this->subject('Confirmação de Cadastro')
					->from('informativo@pisdc.org.br')
					->markdown('vendor.notifications.email')
					->with([
						"level" => 'default',
						"greeting" => "Bem vindo ao Pontifício Instituto Superior de Direito Canonico",
						// "greeting" => "Olá, $aluno->name",
						"introLines" => [
							"Agradecemos o interesse em nossa graduação,",
							"Para concluirmos o seu pedimos que entre em contato com a secretaria de nossa instituição"
						],
						"outroLines"=>["$this->local"]
					]);
    }
}
