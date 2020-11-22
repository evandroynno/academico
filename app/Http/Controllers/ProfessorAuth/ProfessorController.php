<?php

namespace App\Http\Controllers\ProfessorAuth;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Aluno;
use App\Disciplina;
use App\Material;
use App\Turma;
use App\Presenca;
use App\Nota;

class ProfessorController extends Controller
{
	protected $semestre;

    public function __construct(){
		$this->semestre = Turma::orderBy('id','desc')->first()->semestre;
		$this->middleware('auth:professor');
	}

	public function alterarSenha(){
		return view('professor.auth.alterSenha');
	}
	public function alterarSenhaOk(Request $request){
		$validatedData = $request->validate([
			'password' => 'required|min:6|confirmed',
		]);
		Auth::user()->update([
			'password' => bcrypt($validatedData['password']),
		]);
		// dd($validatedData);
		return redirect()
			->route('professor.home')
			->with('status','Senha alterada com sucesso');
	}
	public function editarDados(){
		return view ('professor.editarDados');
	}
	public function updateDados(Request $request){
		if($request['password'] == null){
			$validatedData = $request->validate([
				"name" => 'required',
				"titulo" => "required",
				"especializacao" => "required",
				"eclesialidade" => "required",
				"instituicao" => "required",
				]);
		}else{
			$validatedData = $request->validate([
			'password' => 'required|min:6|confirmed',
			"name" => 'required',
			"titulo" => "required",
			"especializacao" => "required",
			"eclesialidade" => "required",
			"instituicao" => "required",
			]);
		}
		// unset($request['password_confirmation']);
		// dd($request->all());
		Auth::user()->update($validatedData);
		return redirect()->route('professor.home');
	}
	public function selecionarData(){
		$disciplinas = Auth::user()->disciplinas->all();
		// dd($disciplinas['0']->disciplina->name);
		return view('professor.selecionarData',['disciplinas'=>$disciplinas]);
	}
	public function listaDeAlunos(Request $req){
		// dd($req);
		$disciplina=Disciplina::find($req['disciplina']);
		$data=$req['data'];
		$req->session()->put('disciplina',$disciplina);
		$req->session()->put('data',$data);
		$lista = Aluno::whereHas('gradesAtual', function(Builder $query) use ($disciplina){
			$query->where('semestre','like',$this->semestre);
			$query->where('disciplinas','like','%'.$disciplina->cod.'%');
		})->where('verified',true)->where('local',Auth::user()->local)->get();
		return view('professor.chamada',['lista'=>$lista, 'data'=>$data,'disciplina'=>$disciplina]);
	}
	public function salvarPresenca(Request $request){
		// dd($request);
		$presenca = Presenca::create([
			'disciplina' => $request->disciplina,
			'data'=> $request->data,
			'semestre' => $this->semestre,
			'listarPresenca'=> implode(',',$request->listarPresenca),

		]);
		return redirect()
			->route('professor.home')
			->with('status','Lista de presença registrada');

	}
	public function listarPresenca(){
		// Passar para view todas datas das aulas dada pelo professor
		//$aulas = Presenca::
	}
	public function listMaterial(){
		$discs = Auth::user()->disciplinas;
		$disciplinas = [];
		foreach($discs as $disc){
			array_push($disciplinas, $disc->disciplina->cod);
		}
		$materiais = Material::whereIn('disciplina_cod',$disciplinas)->get();
		// dd($materiais);
		return view('professor.listaMaterial',['materiais'=>$materiais]);
	}
	public function cadMaterial(){
		return view('professor.cadMaterial');
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
					->route('professor.listMaterial')
					->with('status','Material cadastrado com sucesso.');
		}
		return redirect()
				->back()
				->with('error','Falha ao cadastrar');

	}
	public function delMaterial($idMaterial){
		// dd($idMaterial);
		$material = Material::find($idMaterial);
		$material->delete();
		if($material){
			return redirect()
					->route('professor.listMaterial')
					->with('status','Material deletado com sucesso.');
		}
		return redirect()
				->back()
				->with('error','Falha ao deletar');
	}
	public function selecionarDisciplina(){

		$disciplinas = Auth::user()->disciplinas->all();
		return view('professor.selecionarDisciplina',['disciplinas'=>$disciplinas]);

	}
	public function alunosMateria(Request $request){

		$disciplinaId=$request['disciplina'];
		if($disciplinaId){
			$disciplina = Disciplina::find($disciplinaId);
			$request->session()->put('disciplina',$disciplina);
		}else{
			$disciplina = $request->session()->get('disciplina');
		}

		$alunos = Aluno::whereHas('gradesAtual', function(Builder $query) use ($disciplina){
			$query->where('semestre','like',$this->semestre);
			$query->where('disciplinas','like','%'.$disciplina->cod.'%');
		})->where('verified',true)->where('local',Auth::user()->local)->get();
		// dd($alunos);

		return view('professor.alunoMateria', ['alunos'=>$alunos]);
	}
	public function lancarNotas2(Request $request, $idAluno){
		// dd($idAluno);
		$aluno = Aluno::find($idAluno);
		$disciplina = $request->session()->get('disciplina');

		$notas = Nota::where("aluno_id", $idAluno)->first();

		// dd($aluno,$disciplina,$notas);
		return view('professor.lancarNotas',['aluno'=>$aluno,'disciplina'=>$disciplina, 'notas'=>$notas]);
	}

	public function lancarNotasOk(Request $request){

		$validatedData=$request->validate([
			'aluno_id' 		=> 'integer',
			'disciplina_id' => 'integer',
			'nota_1' 		=> 'numeric',
			'nota_2' 		=> 'numeric',
			'nota_final' 	=> 'numeric',
		]);

		$nota= Nota::where('aluno_id',$request->aluno_id)->where('disciplina_id',$request->disciplina_id)->first();

		if($nota){
			$nota->update([
			'nota1' 		=> floatval($validatedData['nota_1']),
			'nota2' 		=> floatval($validatedData['nota_2']),
			'notaFinal' 	=> floatval($validatedData['nota_final']),
			]);
		}else{
			$nota = Nota::create([
				'aluno_id' 		=> $validatedData['aluno_id'],
				'disciplina_id' => $validatedData['disciplina_id'],
				'nota1' 		=> floatval($validatedData['nota_1']),
				'nota2' 		=> floatval($validatedData['nota_2']),
				'notaFinal' 	=> floatval($validatedData['nota_final']),
				]);
		}

		return redirect()
				->route('professor.alunosMateria')
				->with('status','Nota cadastrada com sucesso.');
	}

}

