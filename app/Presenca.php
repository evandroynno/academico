<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    protected $fillable =[
		'disciplina','data','listarPresenca','semestre'
	];

	public function listaPorMateria($cod){
		
	}
}
