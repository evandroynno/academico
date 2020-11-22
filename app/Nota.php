<?php

namespace App;

use App\Aluno;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
	//Notas será base do histórico
	protected $fillable = [
		'aluno_id','disciplina_id','nota1','nota2','notaFinal','status','observacao'
	];

	protected $cast = [
		'nota1' => 'float',
		'nota2' => 'float',
		'notaFinal' => 'float'
	];

	public function aluno(){
		return $this->belongsTo(Aluno::class);
	}

	public function disciplina(){
		return $this->belongsTo(Disciplina::class);
	}
}
