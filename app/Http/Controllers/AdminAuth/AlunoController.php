<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aluno;
use App\Disciplina;
use App\Grade;
use App\Turma;
use App\Isencao;
use App\Nota;
use App\Historico;
use App\Mensalidade;

class AlunoController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}
	/**
	 * Listar Alunos para confirmação de cadastro
	 */
	public function listarPendente(){
		$alunos = Aluno::select('name','matricula','email')->where('verified', false)
						->where('local', Auth::user()->local)
						->orderBy('name','asc')->get();
		return view('admin.alunospendente',compact('alunos'));

	}
	public function listarpendenteOk($idAluno){
		$aluno = Aluno::where('matricula',$idAluno)->first();
		$aluno->status = "Matriculado";
		$aluno->verified = true;
		// dd($aluno);
		$aluno->save();

		return redirect()
				->route('admin.listarpendente')
				->with('status','Aluno confirmado');
	}
	/**
	 * Apresentar lista de aluno separado por local
	 */
	public function listaDeAlunos(){
		$alunos = Aluno::where('local', Auth::user()->local)
						->where('verified',true)
						->orderBy('name','asc')->get();
			// foreach($alunos as $aluno){
			// 	var_dump($aluno->gradesAtual);
			// }
			// die;
		return view('admin.alunos.listarAlunos', compact('alunos'));
	}
	public function cadGrade(Request $request, $idAluno){
		$request->session()->put('idAluno',$idAluno);  //salva o idAluno na sessão

		$aluno = Aluno::find($idAluno);  //busca o aluno para ver se já há grade

		/**
		 * utilizar notas para verificar requisitos
		 */
		// dd($aluno->notas->toArray());
		// (object)$materias= array();
		if($aluno->notas->toArray()){
			for($i=0;$i<count($aluno->notas);$i++){
				$materias[$aluno->notas[$i]->disciplina->cod] = (object)array(
								'disciplina' => $aluno->notas[$i]->disciplina->cod,
								'status' => $aluno->notas[$i]->status
									);
			}
		}else{
			$materias = [];
		}
		//Pega a turma (semestre) mais recente
		$turma = Turma::orderBy('id','desc')->get()->first();

		//atribui a um array as disciplinas diponíveis para a grade do semestre
		$disciplinas = explode(',',$turma->disciplinas);

		for($i=0;$i<count($disciplinas);$i++){
			$disciplinas[$i] = Disciplina::where('cod',$disciplinas[$i])->first();
		}

		/**
		 * Buscar grade pra editar
		 */

		$gra = Grade::where('aluno_id',$idAluno)->where('semestre', $turma->semestre)->first();
		if($gra){
			$grade = explode(',',$gra->disciplinas);
		}else{
			$grade = [];
		}
		// dd($grade);
		return view('admin.alunos.cadGrade',compact('disciplinas','aluno','materias','turma','grade'));
	}
	public function cadGradeOk(Request $request){
		// dd($request->all());
		// Recuperando o aluno
		$idAluno = $request->session()->get('idAluno');

		//Pega a turma (semestre) mais recente
		$turma = Turma::orderBy('id','desc')->get()->first();

		// Testar se aluno tem grade
		$grade = Grade::where('aluno_id',$idAluno)->first();
		// dd($grade->disciplinas);

		if($grade && $grade->semestre == $turma->semestre){
			// $grade['disciplinas'] = implode(',',$request["disciplinas"]);
			$mensalidades = Mensalidade::where('aluno_id',$idAluno)
											->where('semestre',$request['semestre'])
											->get();
			foreach($mensalidades as $mensalidade){
				if(!$mensalidade->pago){
					$mensalidade->update([
						'valor' => valorBolsistaDB($request['credSomado'],$request['bolsa'])
					]);
				}
			}
			$grade->update([
				'creditos' => $request['credSomado'],
				'disciplinas' => implode(',',$request["disciplinas"]),
			]);
			// $grade['creditos'] = $request['credSomado'];
			// $grade['disciplinas'] = implode(',',$request["disciplinas"]);
			// dd($grade->id);
		}else{
			//Se não tiver, criar nova grade
			$grade = Grade::create([
				'semestre'		=> $request['semestre'],
				'aluno_id' 		=> $idAluno,
				'disciplinas'	=> implode(',',$request["disciplinas"]),
				'creditos'		=> $request['credSomado']
			]);

			$meses = meses(substr($turma->semestre,-1));
			foreach ($meses as $mes){
				if($mes=='01'||$mes=='02') {
					$venc= (int) substr($turma->semestre,0,4)+1;
				}else {
					$venc = (int) substr($turma->semestre,0,4);
				}
				Mensalidade::create([
					'aluno_id'	=>	$idAluno,
					'mes'		=>	(int) $mes,
					'semestre'	=>	$turma->semestre,
					'data_venv'	=>	$venc.'-'.$mes.'-06',
					'valor'		=>	valorBolsistaDB($request['credSomado'],$request['bolsa']),
					'pago'		=>	$request['bolsa'] == '100' ? 1:0
				]);
			}
		}

		$idAluno = $request->session()->forget('idAluno');

		return redirect()
				// ->back()
				->route("admin.listaAluno")
				->with('status', 'Grade Registrada');
	}
	public function verGrade($idAluno){
		$aluno = Aluno::find($idAluno);
		// dd($aluno->grades['0']->disciplinas);
		if($aluno->gradesAtual){
			$materias = explode(',',$aluno->gradesAtual->disciplinas);
			$cont = count($materias);
			for($i=0;$i < $cont;$i++){
				$mats[$i] = Disciplina::where('cod',$materias[$i])->first();
				// dd($mats[$i]->name);
			}
		}else{
			$mats = [];
		}

		return view('admin.alunos.verGrade',compact('mats'));
	}
	/**
	 * Trancar Matricula
	 */
	public function trancar($idAluno){
		$aluno = Aluno::find($idAluno);
		$aluno->status = "trancado";
	}
	public function atribuirBolsa(Request $request){
		// dd($request);
		$bolsa = Isencao::where('aluno_id',$request['idAluno'])->first();

		if($bolsa){
			$bolsa->update([
				'aluno_id'=> $request['idAluno'],
				'percentual'=> $request['percentual'],
				'mantenedor'=> ($request['mantenedor']) ? $request['mantenedor'] : "Diocese",
				'carta' => $request['carta']
			]);
		}
		else{
			$bolsa = Isencao::create([
				'aluno_id'=> $request['idAluno'],
				'percentual'=> $request['percentual'],
				'mantenedor'=> ($request['mantenedor']) ? $request['mantenedor'] : "Diocese",
				'carta' => $request['carta']
			]);
		}

		return redirect()
				->route('admin.listaAluno')
				->with('status',"Bolsa atribuida com sucesso");
	}
	/**
	 * gerar view de historico e criar versão em pdf
	 */
	public function gerarHistorico($idAluno){
		$aluno = Aluno::find($idAluno);
		$disciplinas = Disciplina::all();
		$notas = Nota::where('aluno_id', $idAluno)->get();

		// dd($aluno->notas->where('disciplina_id',2)->first()->notaFinal);
		return view('admin.alunos.gerarHistorico',compact('aluno','disciplinas','notas'));
	}
	public function gerarHistoricoPDF($idAluno){
		$aluno = Aluno::find($idAluno);
		$disciplinas = Disciplina::all();
		$notas = Nota::where('aluno_id', $idAluno)->get();

		$pdf = PDF::loadView('pdf.historico',['aluno' => $aluno,'disciplinas' => $disciplinas, 'notas'=>$notas])->setWarnings(false);
		return $pdf->stream();
		// dd($aluno->notas->where('disciplina_id',2)->first()->notaFinal);
		// return view('admin.alunos.gerarHistorico',compact('aluno','disciplinas','notas'));
	}

}
