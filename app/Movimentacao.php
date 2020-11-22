<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $fillable = [
		'nome','tipo','valor','descricao','data','mesano'
	];

}
