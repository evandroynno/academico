<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = [
    	'solicitacao_id','name', 'mensagem'
    ];

    public function solicitacao(){
    	return $this->belongsTo(Solicitacao::class);
    }
}
