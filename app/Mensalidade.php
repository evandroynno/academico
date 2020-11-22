<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    protected $fillable = [
		'aluno_id','mes','semestre',
		'data_venv','valor','pago','movimentacao_id'
	];

	public function aluno(){
		return $this->belongsTo(Aluno::class);
	}
}
