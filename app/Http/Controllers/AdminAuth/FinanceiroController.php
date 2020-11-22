<?php

namespace App\Http\Controllers\AdminAuth;

use Auth;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aluno;
use App\Mensalidade;
use App\Isencao;
use App\Turma;
use App\Movimentacao;
use Carbon\Carbon;

class FinanceiroController extends Controller
{
	// protected $mesAtual;
	public function __construct(){
		$this->middleware('auth:admin');
		// $this->mesAtual(date('m'));
	}
	/**
	 * listar alunos que estão matriculados no semestre
	 */
	public function listaParaPagamentos(){
		$alunos = Aluno::where('local', Auth::user()->local)
						->get();
		$alunos_pagantes = [];
		for($i=0;$i<count($alunos);$i++){
			if($alunos[$i]->mensalidades->first()){
				$alunos_pagantes[$i] = $alunos[$i];
			}
		}
		// dd($alunos_pagantes);

		return view('admin.financeiro.listadealunos_financeira', compact('alunos_pagantes'));
	}
	public function efetuarPagamento($idAluno){
		$aluno = Aluno::find($idAluno);
		// $mensalidades = $aluno->grades->first()->creditos;
		$h = Carbon::now();
		// dd($h);
		return view('admin.financeiro.efetuarPagamentos', compact('aluno','h'));
	}
	public function efetuarPagamentoOk($idMensalidade){
		$mensalidade = Mensalidade::find($idMensalidade);
		// dd($mensalidade->aluno->name);
		$mov = Movimentacao::create([
			'nome'		=> "Mensalidade Paga",
			'tipo' 		=> "E",
			'valor'		=> $mensalidade->valor,
			'descricao' => "Mensalidade de ".$mensalidade->aluno->name,
			'data'		=>  date("Y-m-d"),
			'mesano'	=> date('m/Y'),
		]);
		$mensalidade->update([
			'pago' => true,
			'movimentacao_id' => $mov->id
		]);
		return redirect("/admin/efetuar_pagamento/$mensalidade->aluno_id")->with('status','Mensalidade Paga');
	}
	public function reverterPagamento($idMensalidade){
		$mensalidade = Mensalidade::find($idMensalidade);
		$mov = Movimentacao::find($mensalidade->movimentacao_id);
		$mensalidade->update([
			'pago' => false,
			'movimentacao_id' => null
		]);
		$mov->delete();

		return redirect("/admin/efetuar_pagamento/$mensalidade->aluno_id")->with('status','Mensalidade Revertida');
	}
	public function escolhaSemestre2(Request $request){
		$end = $request->segments();
		$link = end($end);
		$turmas = Turma::orderBy('semestre', 'desc')->get();
		// DD($link);
		return view('admin.financeiro.escolhaSemestre2',compact('turmas','link'));
	}

	public function escolhaSemestre(Request $request){
		
		$turmas = Turma::orderBy('semestre', 'desc')->get();
		
		return view('admin.financeiro.escolhaSemestre',compact('turmas'));
	}

	public function relatorioDeMensalidades(Request $request){
		$alunos = Aluno::where('local', Auth::user()->local)->get();

		$request->session()->put('semestre',$request['semestre']);

		$turma = Turma::where('semestre',$request['semestre'])->first();
		$meses = meses(substr($turma->semestre,-1));
		// dd($turma->semestre, $meses, $alunos);
		return view('admin.financeiro.relatorioDeMensalidades',compact('alunos','meses'));
	}
	public function baixarRelatorio(Request $request){
		$semestre = $request->session()->get('semestre');
		$alunos = Aluno::where('local', Auth::user()->local)->get();
		$turma = Turma::where('semestre',$semestre)->first();
		$meses = meses(substr($turma->semestre,-1));

		$pdf= PDF::loadView('pdf.layout',['alunos' => $alunos,'meses' => $meses, 'turma'=>$turma])->setPaper('a4', 'landscape')->setWarnings(false);

		return $pdf->stream('testfile.pdf');
	}
	public function registrarMovimentacao(Request $req){
		// dd(date('m/Y', strtotime(str_replace('/', '-', $req['data']))));
		// dd($req->allx());

		$mov = Movimentacao::create([
			'tipo' 		=> $req['tipo'],
			'nome' 		=> $req['nome'],
			'valor'		=> ($req['tipo'] == 'S')?-tofloat($req['valor']):tofloat($req['valor']),
			'data' 		=> $req['data'],
			'mesano'	=> date('m/Y', strtotime(str_replace('/', '-', $req['data']))),
			'descricao'	=> $req['descricao']
		]);

		if($mov){
			return redirect()->back()->with('status','Trasação adicionada com sucesso!');
		}
		return redirect()->back()->with('error','Ocorreu um erro ao cadastrar Trasação!');

		// return view('admin.financeiro.registrarMovimentacao');
	}
	public function historicoMovimentos(Request $request, $mes = null,$ano=null){
		$mes?$mes:$mes=date('m');
		$ano?$ano:$ano=date('Y');
		// dd($mes);

		$end = implode('/', $request->segments());
		$request->session()->put('end',$end);

		$movs = Movimentacao::select('id','nome','tipo','valor','descricao','data')->whereMonth('data', $mes)->whereYear('data', $ano)->orderBy('data', 'asc')->get();
		$total = $movs->sum('valor');
		// dd($movs->toJson());

		$ms = Movimentacao::select('mesAno')->distinct()->get();
		// dd($ms->mesAno);

		return view('admin.financeiro.historicoMovimentos',compact('movs','total','ms'));
	}
	public function apagarMovimento(Request $request,$idMovimento){
		$end = $request->session()->get('end');

		$movimento = Movimentacao::find($idMovimento);
		// dd($movimento);
		$movimento->delete();

		return redirect($end)->with('status','Transação apagada');

	}
	public function escolhaMes(){
		$mesano = date("Y")."-".date("m");
		return view('admin.financeiro.escolhaMes',compact('mesano'));
	}
	public function relatorioMovimentacao(Request $request){
		$mes = substr($request["meseano"], -2);
		$ano = substr($request["meseano"], 0 , -3);
		$request->session()->put(['mes'=>$mes,'ano'=>$ano]);
		$movs = Movimentacao::whereMonth('data', $mes)->whereYear('data', $ano)->orderBy('data', 'asc')->get();
		// dd($movs);

		return view('admin.financeiro.relatorioMovimentacao', compact('movs'));
	}
	public function baixarRelatorioMovs(Request $request){
		$mes = $request->session()->get('mes');
		$ano = $request->session()->get('ano');

		$movs = Movimentacao::whereMonth('data', $mes)->whereYear('data', $ano)->orderBy('data', 'asc')->get();

		$pdf = PDF::loadView('pdf.movimentacao',['mes' => $mes, 'ano' =>$ano,'movs'=>$movs])->setPaper('a4', 'portrait')->setWarnings(false);
		return $pdf->stream('testfile.pdf',array('Attachment'=>false));
	}
	public function movimentoVue($mes){

		return Movimentacao::select('id','nome','tipo','valor','descricao','data')->whereMonth('data', $mes)->get()->toJson();
	}
}
