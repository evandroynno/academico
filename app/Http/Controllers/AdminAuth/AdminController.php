<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Support\Facades\Auth;
use Keygen\Keygen;
use App\State;
use App\Aluno;
use App\Turma;
use App\Disciplina;
use App\Grade;
use App\Nota;
use App\Professor;
use App\Prof_Disc;
use App\Admin;
use App\Solicitacao;
use App\Mensagem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;


class AdminController extends Controller
{
	public function __construct(){
		$this->semestre = Turma::orderBy('id','desc')->first()->semestre;
		$this->middleware('auth:admin');
	}
	/**
	 * Cadastro de alunos feito na Secretaria
	 */
	public function cadAluno(){
		$ufs = State::orderBy('name','asc')->get();
		return view('admin.cadAluno',compact('ufs'));
	}
	public function cadAlunoOk(Request $request){
		// dd($request->all());
		$validate=$request->validate([
			"name"=>'required',
			'email' => 'required|email|unique:alunos,email',
			'password' => 'required|min:6|confirmed',
			'dt_nasc' => 'nullable',
			'uf' => 'nullable',
			'cidade' => 'nullable',

		]);
		if(date('n') > 9){ // (date('n') > 9? date('Y') + 1 : date('Y'))
			$ano = date('Y') + 1;
		}else{
			$ano = date('Y');
		}
		switch ($request['local'] != null ? $request['local'] : Auth::user()->local) {
			case 'rio':
				$local = 1;
				break;
			case 'londrina':
				$local = 2;
				break;
			case 'goiania':
					$local = 3;
					break;
			default:
				$local = 1;
				break;
		}
		$aluno = Aluno::create([
            'matricula' => $ano.(date('n') > 3 && date('n') < 9 ?'02':'01').$local.Keygen::numeric(3)->generate(),
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => bcrypt($request['password']),
			'dt_nasc' => $request['dt_nasc'],
			'sexo' => $request['sexo'],
			'uf' => $request['uf'],
			'cidade' => $request['cidade'],
			'perfil' => $request['perfil'],
			'telefone' => $request['telefone'],
			'local' => $request['local'],
			'status' => 'Matriculado',
			'verified' => true,
		]);
		if($aluno){
			return redirect()
					->route('admin.home')
					->with('status','Aluno cadastrado com sucesso');
		}
		return redirect()
				->back()
				->with('error', 'Falha ao cadastrar');
	}
	public function cadFunc(){

		return view('admin.cadFunc');
	}
	public function cadFuncOk(Request $request){
		$validate=$request->validate([
			"name"=>'required',
			'email' => 'required|email|unique:admins,email',
			'password' => 'required|min:6|confirmed',
		]);
		$funcionario = Admin::create([
            'name' 		=> $request['name'],
            'email' 	=> $request['email'],
            'password' 	=> bcrypt($request['password']),
            'tipo' 		=> $request['tipo'],
            'dt_nasc' 	=> $request['dt_nasc'],
            'telefone' 	=> $request['telefone'],
			'local'		=> $request['local'] != null ? $request['local'] : Auth::user()->local,
		]);
		if($funcionario){
			return redirect()
					->route('admin.home')
					->with('status','Funcionario cadastrado com sucesso');
		}
		return redirect()
				->back()
				->with('error', 'Falha ao cadastrar');
	}
	public function descadastrarFuncionario($idFunc){
		$func = Admin::find($idFunc);
		$func->delete();
		return redirect()->route('admin.listaFunc')->with('status','Funcionário apagado do Sistema!');
	}
	public function alterarSenhaFunc(){

		return view('admin.auth.alterSenha');
	}
	public function alterarSenhaFuncOk(Request $request){
		$validatedData = $request->validate([
			'password' => 'required|min:6|confirmed',
		]);
		Auth::user()->update([
			'password' => bcrypt($validatedData['password']),
		]);
		// dd($validatedData);
		return redirect()
			->route('admin.home')
			->with('status','Senha alterada com sucesso');
	}
	public function cadProf(){
		// $this->authorize('master', Auth::user());
		return view('admin.cadProfessor');
	}
	public function cadProfOk(Request $request){
		// dd($request);
		$validate=$request->validate([
			'email'				=> 'bail|required|email|unique:professors,email',
			'name'				=> 'required',
			'telefone'			=> 'nullable',
			'password' 			=> 'required|min:6|confirmed',
			'local'				=> 'required',
			'dt_nasc'			=> 'required',
			'titulo' 			=> 'nullable',
			'especializacao' 	=> 'nullable',
			'instituicao' 		=> 'nullable'
		]);
		$professor = Professor::create([
			'name'			=> $request['name'],
			'email'			=> $request['email'],
			'telefone'		=> $request['telefone'],
			'password'		=> bcrypt($request['password']),
			'local'			=> $request['local'] != null ? $request['local'] : Auth::user()->local,
			'eclesialidade'	=> $request['eclesialidade'],
			'dt_nasc'		=> $request['dt_nasc'],
			'titulo'		=> $request['titulo'],
			'especializacao'=> $request['especializacao'],
			'instituicao'	=> $request['instituicao'],
			'status'		=> $request['status'],
		]);
		if($professor){
			return redirect()
					->route('admin.home')
					->with('status','Professor cadastrado com sucesso');
		}
		return redirect()
				->back()
				->with('error', 'Falha ao cadastrar');
	}
	public function criarTurma(){
		$disciplinas = Disciplina::get();
		return view('admin.criarTurma',compact('disciplinas'));
	}
	public function criarTurmaOk(Request $request){
		$turm = Turma::create([
			'semestre' 		=> $request['semestre'],
			'disciplinas'	=> implode(',',$request["disciplinas"]),
			'local'			=> Auth::user()->local
		]);

		return redirect()->route('admin.home')->with('status','Turma criada com sucesso');
	}
	public function listarTurma(){

		/**
		 * Buscar na lista de grades todos os registro com o mesmo semestre
		 */
		$turma = Turma::orderBy('id','desc')->get()->first();

		/**
		 * Buscar alunos de acordo com a turma
		 * procurar na tabela de grade por registro com o semestre correspondente a turma
		 */

		$dados = Grade::where('semestre', $turma->semestre)->get();

		return view('admin.alunos.listarTurma', compact('dados'));
	}

	public function listarProfessores(){
		$professores = Professor::where('local', Auth::user()->local)->get();
		$disciplinas = Disciplina::get();
		$turma = Turma::orderBy('id','desc')->get()->first();

		// dd($);

		return view('admin.listadeprofessores',['professores' => $professores, 'disciplinas' => $disciplinas, 'turma' => $turma]);
	}
	public function atribuirDisciplina(Request $request){
		// $atribuir = Prof_Disc::where('professor_id',$request['idProfessor'])->first();
		// dd($request->all());

		foreach($request['disciplinas'] as $disciplina){
			Prof_Disc::create([
				'professor_id'	=>$request['idProfessor'],
				'disciplina_id'	=>$disciplina,
				'local'			=>Auth::user()->local,
				'semestre'		=>$request['semestre'],
			]);
		}

		// if($atribuir){
		// 	foreach($request['disciplinas'] as $disciplina){
		// 		$atribuir->update([
		// 			'professor_id'	=>$request['idProfessor'],
		// 			'disciplina_id'	=>implode(',',$request['disciplinas']),
		// 			'local'			=>$request['local'],
		// 			'semestre'		=>$request['semestre'],
		// 		]);
		// 	}
		// }else{
		// 	foreach($request['disciplinas'] as $disciplina){
		// 		$atribuir = Prof_Disc::create([
		// 			'professor_id'	=>$request['idProfessor'],
		// 			'disciplina_id'	=>$disciplina,
		// 			'local'			=>Auth::user()->local,
		// 			'semestre'		=>$request['semestre'],
		// 		]);
		// 	}
		// }

		return redirect()
				->route('admin.listarProfessores')
				->with('status','Disciplina atribuida');
	}
	public function solicitacoes(){
		$solicitacoes = Solicitacao::where('status','<>', 'Encerrado')->get();
		// dd($solicitacoes);

		return view('admin.alunos.solicitacao',compact('solicitacoes'));
	}
	public function responderSolicitacao(Request $request){
		Solicitacao::where('id',$request->solicitacao)->update(['status' => 'Respondido']);
		$mensagem = Mensagem::create([
			'solicitacao_id' => $request->solicitacao,
			'name' => Auth::user()->name,
			'mensagem' => $request->mensagem
		]);
		return redirect()->route('admin.solicitacoes')->with('status', 'Solicitação Respondida');
	}
	public function encerrarSolicitacao($idSolicitacao){

		$mensagem = Mensagem::create([
			'solicitacao_id' => $idSolicitacao,
			'name' => 'Sistema',
			'mensagem' => "Sua solicitação foi encerrada."
		]);
		$solicitacao = Solicitacao::find($idSolicitacao);
		$solicitacao->status = "Encerrado";
		$solicitacao->save();
		return redirect()->route('admin.solicitacoes')->with('status', 'Solicitação encerrada');
	}
	public function selecionarMateria(){

		$disciplinas = Disciplina::get()->all();
		return view('admin.selecionarMateria',['disciplinas'=>$disciplinas]);
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

		return view('admin.alunosMateria', ['alunos'=>$alunos])->with('disciplina',$disciplina);
	}
	public function lancarNotas(Request $request, $idAluno){

		$aluno = Aluno::find($idAluno);
		$disciplina = $request->session()->get('disciplina');

		$notas = Nota::where("aluno_id", $idAluno)->first();
		// dd($aluno,$disciplina);
			return view('admin.lancarNotas',['aluno'=>$aluno,'disciplina'=>$disciplina, 'notas'=>$notas]);
	}
	public function lancarNotasOk(Request $request){

		//validar dados vindo da pagina de notas
		$validatedData=$request->validate([
			'aluno_id' 		=> 'integer',
			'disciplina_id' => 'integer',
			'nota_1' 		=> 'numeric',
			'nota_2' 		=> 'numeric',
			'nota_final' 	=> 'numeric',
		]);

		//busca por existencia de nota
		$nota= Nota::where('aluno_id',$request->aluno_id)->where('disciplina_id',$request->disciplina_id)->first();

		//havendo nota atualiza a nota existente
		if($nota){
			$nota->update([
				'nota1' 		=> floatval($validatedData['nota_1']),
				'nota2' 		=> floatval($validatedData['nota_2']),
				'notaFinal' 	=> floatval($validatedData['nota_final']),
			]);
		}else{
			//não havendo, cria nota
			$nota = Nota::create([
				'aluno_id' 		=> $validatedData['aluno_id'],
				'disciplina_id' => $validatedData['disciplina_id'],
				'nota1' 		=> floatval($validatedData['nota_1']),
				'nota2' 		=> floatval($validatedData['nota_2']),
				'notaFinal' 	=> floatval($validatedData['nota_final']),
				]);
		}


		return redirect()
			->route('admin.alunosMateria')
			->with('status','Nota cadastrada com sucesso.');

	}
	public function listaFunc(){
		$funcionarios = Admin::where('local', Auth::user()->local)->where('tipo','<>','master')->get();
		// dd($funcionarios);
		return view('admin.listaFunc',['funcionarios'=>$funcionarios]);
	}
	public function definirAcesso(Request $resquest){
		$funcionario = Admin::find($resquest['idFuncionario']);
		$funcionario->tipo = $resquest['tipo'];
		$funcionario->save();

		return redirect()
			->route('admin.listFunc')
			->with('status', 'Tipo de Acesso auterado com sucesso');
	}
}
