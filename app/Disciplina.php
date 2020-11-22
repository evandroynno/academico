<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $fillable = [
		'cod','name','semestre','creditos','requisito_cod'
	];

	public function dependente(){
		return $this->hasMany('App\Disciplina','requisito_cod','cod');
	}

	public function requisito(){
		return $this->belongsTo('App\Disciplina','requisito_cod','cod');
	}

	public function materials(){
		return $this->hasMany(Material::class,'disciplina_cod','cod');
	}
	public function notas(){
		return $this->hasMany(Nota::class);
	}
	public function professores(){
		return $this->hasManyThrough('App\Prof_Disc', 'App\Professor');
	}
}
