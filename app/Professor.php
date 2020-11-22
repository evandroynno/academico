<?php

namespace App;

use App\Prof_Disc;
use App\Disciplina;
use App\Notifications\ProfessorResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Professor extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','local','eclesialidade','dt_nasc',
		'titulo','especializacao','instituicao','status','telefone',
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
        $this->notify(new ProfessorResetPassword($token));
	}

	public function disciplinas(){
		return $this->hasMany(Prof_Disc::class);
	}

}
