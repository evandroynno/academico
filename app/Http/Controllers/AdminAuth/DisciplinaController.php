<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Disciplina;
use App\Material;
use App\State;
use App\City;
use Auth;

class DisciplinaController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}

	public function debug(){
		// $estados = State::all();
		// foreach ($estados as $estado){
		// 	var_dump($estado->cities);
		// }
		// $disciplinas = Disciplina::where('requisito_cod','fil01')->first();
		// var_dump($disciplinas->requisito['cod']);
		// foreach ($disciplinas as $disciplina) {
		// 	var_dump($disciplina);
		// 	echo "<br>";
		// }

		dd(Auth);

	}

	public function listarDisciplinas(){
		$disciplinas = Disciplina::all();
		// dd($disciplinas);
		return view('admin.listarDisciplinas',compact('disciplinas'));
	}
	public function cadDisciplina(){
		return view('admin.cadDisciplina');
	}
	public function cadDisciplinaOk(Request $request){
		// dd($request->all());

		$disciplina = Disciplina::create([
			"name" 			=> $request["name"],
			"cod" 			=> $request["cod"],
			"semestre"		=> $request["etapa"],
			"creditos" 		=> $request["creditos"],
			"requisito_cod" => $request["requisito_cod"]
		]);
		// dd($disciplina->toSql());
		if($disciplina){
			return redirect()
					->route('admin.listarDisciplinas')
					->with('status','Disciplina cadastrada com sucesso');
		}
		return redirect()
				->back()
				->with('error', 'Falha ao cadastrar');

	}
	public function listarMaterial(){
		$materiais = Material::get();
		// dd($materiais);
		return view('admin.listarMaterial',compact('materiais'));
	}
	public function cadMaterial(){
		$disciplinas = Disciplina::all();
		return view('admin.cadMaterial',compact('disciplinas'));
	}
	public function cadMaterialOk(Request $request){
		// dd($request->all());
		$material = Material::create([
			"name"=>$request['nomeMaterial'],
			"link"=>$request['link'],
			"disciplina_cod"=>$request['disciplina_cod']
		]);
		if($material){
			return redirect()
					->route('admin.listarMaterial')
					->with('status','Material cadastrado com sucesso.');
		}
		return redirect()
				->back()
				->with('error','Falha ao cadastrar');

	}
	public function deleteMaterial($idMaterial){
		// dd($idMaterial);
		$material = Material::find($idMaterial);
		$material->delete();
		if($material){
			return redirect()
					->route('admin.listarMaterial')
					->with('status','Material deletado com sucesso.');
		}
		return redirect()
				->back()
				->with('error','Falha ao deletar');
	}
}
