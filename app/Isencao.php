<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isencao extends Model
{
    protected $fillable = [
		'aluno_id', 'percentual','mantenedor','carta'
	];
}
