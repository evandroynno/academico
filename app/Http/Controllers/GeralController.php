<?php

namespace App\Http\Controllers;

use App\City;
use App\Nota;
use	App\Disciplina;
use Illuminate\Http\Request;

class GeralController extends Controller
{
    public function getCidades($state_id){
        $cidades = City::where('state_id', $state_id)->orderBy('name', 'asc')->get();
        return $cidades->toArray();
    }

	public function getNotas($aluno_id){
		$notas = Nota::where('aluno_id',$aluno_id)->get();
		dd($notas);
		return $notas['0']->disciplina->cod;
	}

	public function getDisciplina($codDisciplina){
		$disciplina = Disciplina::where('cod',$codDisciplina)->first();
		dd($disciplina->name);
	}
}
