<?php

namespace App;

use App\Notifications\AlunoResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Aluno extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','matricula',
        'dt_nasc', 'sexo', 'uf', 'cidade',
        'perfil', 'creditos', 'etapa_curso',
        'status','telefone', 'local',
        'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AlunoResetPassword($token));
    }

    /**
     * Verificar confirmação de email
     */
    public function verifyAluno(){
        return $this->hasOne(VerifyAluno::class);
	}

	/**
	 * Listar Alunos não confirmado
	 */
	public function pendente(){
		return Aluno::where('verified', false)
				->orderBy('name','asc')->get();
	}
    public function grades(){
        return $this->hasMany(Grade::class);
    }
    public function gradesAtual(){
        return $this->hasOne(Grade::class);
    }
	public function bolsa(){
		return $this->hasOne(Isencao::class);
	}
       public function notas(){
        return $this->hasMany(Nota::class);
    }
    public function notas_dadas($cod){
        return $this->hasOne(Nota::class)->where('disciplina_id','=',$cod);
    }
    public function mensalidades(){
        return $this->hasMany(Mensalidade::class);
    }
    public function solicitacaos(){
        return $this->hasMany(Solicitacao::class);
    }
    public function solicitacaosRespondidas(){
        return $this->hasMany(Solicitacao::class)->where('status','=','Respondido');
    }

}
