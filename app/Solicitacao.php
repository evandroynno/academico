<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $fillable = [
    	'aluno_id','tipo','status'
    ];

    public function mensagens(){
    	return $this->hasMany(Mensagem::class);
    }
}
