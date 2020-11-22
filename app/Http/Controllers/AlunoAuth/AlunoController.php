<?php

namespace App\Http\Controllers\AlunoAuth;

use Auth;
use Illuminate\Http\Request;
use Keygen\Keygen;
use App\City;
use App\Grade;
use App\Disciplina;
use App\Material;
use App\Nota;
use App\Solicitacao;
use App\Mensagem;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class AlunoController extends Controller
{
    public function __construct(){

        $this->middleware('auth:aluno');
    }

    public function editarDados(){

        return view('aluno.editarCadastro');
	}

    public function updateDados(Request $request){
		// dd($request);
		$validate=$request->validate([
			'password' => 'required|min:6|confirmed'
		]);
		$aluno = Aluno::find(Auth::user()->id);
		if(isset($request['name'])){
			$aluno->name = $request['name'];
		}
		if(isset($request['password'])){
			$aluno->password = bcrypt($request['password']);
		}
		if($aluno->save()){
			return redirect()
					->route('aluno.editarDados')
					->with('status','Senhan Alterada');
		}
	}
	public function alterarSenha(){

		return view('aluno.auth.alterSenha');
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
			->route('aluno.home')
			->with('status','Senha alterada com sucesso');
	}
	public function disciplinas(){
		// dd(Auth::user()->grades->toArray());
		if(Auth::user()->grades){
			$materias = explode(',',Auth::user()->grades['0']->disciplinas);
			$cont = count($materias);
			for($i=0;$i < $cont;$i++){
				$mats[$i] = Disciplina::where('cod',$materias[$i])->first();
				// dd($mats[$i]->name);
			}
		}else{
			$mats = [];
		}

		$grade = Grade::where('aluno_id',Auth::user()->id)->first();
		// dd($grade);
		$disciplinas = explode(',', $grade->disciplinas);
		return view('aluno.disciplinas',['grade' => $grade, 'disciplinas'=>$disciplinas,'mats'=>$mats]);
	}
	public function materiais(){
		// dd(explode(',',Auth::user()->grades['0']->disciplinas));
		$materiais = Material::whereIn('disciplina_cod',explode(',',Auth::user()->grades['0']->disciplinas))->get();
		// dd($materiais->toArray());
		return view('aluno.material',['materiais'=>$materiais]);
	}
	public function notas(){
		$aluno = Auth::user();
		$notas = Nota::where('aluno_id', Auth::user()->id)->get();

		// $aluno->notas->toArray()
		
		// dd($aluno->notas,$notas['0']->aluno->name);

		return view('aluno.exibirNotas',compact('notas'));
		return "Em constrção";
	}

	public function consultarPagamento(){
		$aluno = Auth::user();
		// $mensalidades = $aluno->grades->first()->creditos;
		$h = Carbon::now();
		// dd($h);
		return view('aluno.infoPagamentos', compact('aluno','h'));
	}

	public function solicitacoes(){
		// dd(Auth::user()->solicitacaosRespondidas->count());

		$solicitacoes = Solicitacao::where('aluno_id', Auth::user()->id)->orderBy('id','desc')->get();

		// dd($solicitacoes->toArray());

		return view('aluno.solicitacoes', compact('solicitacoes'));
	}

	public function novaSolicitacao(){

		return view('aluno.novaSolicitacao');
	}

	public function novaSolicitacaoOK(Request $request){
		// dd($request->mensagem);

		$solicitacao = Solicitacao::create([
			'aluno_id' => Auth::user()->id,
			'tipo' => $request->tipo,
			'status' =>'Aberto',
		]);

		// dd($solicitacao->id);
		$mensagem = new Mensagem;
		$mensagem->solicitacao_id = $solicitacao->id;
		$mensagem->name = Auth::user()->name;
		$mensagem->mensagem = $request->mensagem;
		$mensagem->save();
		
		// $solicitacao = new Solicitacao;
		// $solicitacao->aluno_id = Auth::user()->id;
		// $solicitacao->tipo = $request->tipo;
		// $solicitacao->status = 'Aberto';


		// $solicitacao->mensagem = $request->mensagem;
		


		return redirect()
				->route('aluno.home')
				->with('status', 'Solicitação enviada');
	}

	public function novaMensagem(Request $request){
		// dd($request->all());
		Solicitacao::where('id',$request->solicitacao)->update(['status' => 'Aberto']);
		$mensagem = Mensagem::create([
			'solicitacao_id' => $request->solicitacao,
			'name' => Auth::user()->name,
			'mensagem' => $request->mensagem
		]);


		return redirect()
				->route('aluno.solicitacoes');
	}

    protected function guard(){
        return Auth::guard('aluno');
    }
}
