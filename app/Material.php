<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Disciplina;

class Material extends Model
{
	protected $fillable = ['name','link','disciplina_cod'];

	public function disciplina(){
		return $this->belongsTo(Disciplina::class,'disciplina_cod','cod');
	}

	/**
	 * buscar material pela disciplina
	 */
	public function porDisciplina($cod){
		return Material::where('requisito_cod',$cod)->get();
	}
}
