<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
	protected $fillable = [
		'aluno_id', 'disciplinas','semestre','creditos'
	];

	public function aluno(){
		return $this->belongsTo(Aluno::class);
	}

}
