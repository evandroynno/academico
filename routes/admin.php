<?php
// use Illuminate\Routing\Route;

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);
    $solicitacoes = \App\Solicitacao::where('status','Aberto')->get();

    return view('admin.home',compact('solicitacoes'));
})->name('home');

Route::get('/debug', 'AdminAuth\DisciplinaController@debug');

Route::get('/cadastrar_Aluno','AdminAuth\AdminController@cadAluno')->name('cadAluno');
Route::post('/cadastrar_Aluno','AdminAuth\AdminController@cadAlunoOk')->name('cadAlunoOk');

Route::get('/listar_pendente','AdminAuth\AlunoController@listarPendente')->name('listarpendente');
Route::get('/listar_pendenteOk/{idAluno}','AdminAuth\AlunoController@listarPendenteOk')->name('listarpendenteOk');

Route::get('/cadastrar_Funcionario','AdminAuth\AdminController@cadFunc')->name('cadFunc');
Route::post('/cadastrar_Funcionario','AdminAuth\AdminController@cadFuncOk')->name('cadFuncOk');
Route::post('/definirAcesso', 'AdminAuth\AdminController@definirAcesso')->name('definirAcesso');
Route::get('/descadastrarFuncionario/{idFunc}','AdminAuth\AdminController@descadastrarFuncionario')->name('descadastrarFuncionario');

Route::get('/alterar_Senha','AdminAuth\AdminController@alterarSenhaFunc')->name('alterSenha');
Route::post('/alterar_Senha','AdminAuth\AdminController@alterarSenhaFuncOk')->name('alterSenhaOk');

Route::get('/cadastrar_Professor','AdminAuth\AdminController@cadProf')->name('cadProf');
Route::post('/cadastrar_Professor','AdminAuth\AdminController@cadProfOk')->name('cadProfOk');

Route::get('/listar_professores', 'AdminAuth\AdminController@listarProfessores')->name('listarProfessores');
Route::post('/atribuir_disciplina', 'AdminAuth\AdminController@atribuirDisciplina')->name('atribuirDisciplina');

Route::get('/criar_turma','AdminAuth\AdminController@criarTurma')->name('criarTurma');
Route::post('/criar_turma','AdminAuth\AdminController@criarTurmaOk')->name('criarTurmaOk');

Route::get('/listar_turma','AdminAuth\AdminController@listarTurma')->name('listarTurma');

Route::get('/lista_de_alunos','AdminAuth\AlunoController@listaDeAlunos')->name('listaAluno');
// Route::post('/lista_de_alunos/adicionar_creditos','AdminAuth\AlunoController@addCredOk')->name('addCred');

Route::get('/lista_de_alunos/verGrade/{idAluno}', 'AdminAuth\AlunoController@verGrade')->name('verGrade');
Route::get('/lista_de_alunos/cadGrade/{idAluno}', 'AdminAuth\AlunoController@cadGrade')->name('cadGrade');
Route::post('/lista_de_alunos/cadGradeOk', 'AdminAuth\AlunoController@cadGradeOk')->name('cadGradeOk');

Route::get('/lista_de_alunos/gerarHistorico/{idAluno}', 'AdminAuth\AlunoController@gerarHistorico')->name('gerarHistorico');
Route::get('/lista_de_alunos/gerarHistoricoPDF/{idAluno}', 'AdminAuth\AlunoController@gerarHistoricoPDF')->name('gerarHistoricoPDF');

Route::post('/atribuir_bolsa', 'AdminAuth\AlunoController@atribuirBolsa')->name('atribuirBolsa');

Route::get('/listar_Disciplinas','AdminAuth\DisciplinaController@listarDisciplinas')->name('listarDisciplinas');
Route::get('/listar_Disciplinas/cadastrar_Disciplina','AdminAuth\DisciplinaController@cadDisciplina')->name('cadDisciplina');
Route::post('/listar_Disciplinas/cadastrar_DisciplinaOk','AdminAuth\DisciplinaController@cadDisciplinaOk')->name('cadDisciplinaOk');

Route::get('/listar_Marterial','AdminAuth\DisciplinaController@listarMaterial')->name('listarMaterial');
Route::get('/cadastrar_material','AdminAuth\DisciplinaController@cadMaterial')->name('cadMaterial');
Route::post('/cadastrar_material','AdminAuth\DisciplinaController@cadMaterialOk')->name('cadMaterialOk');
Route::get('/deletar_material/{idMaterial}','AdminAuth\DisciplinaController@deleteMaterial')->name('deleteMaterial');

Route::get('/solicitacoes','AdminAuth\AdminController@solicitacoes')->name('solicitacoes');
Route::post('/responderSolicitacao', 'AdminAuth\AdminController@responderSolicitacao')->name('responderSolicitacao');
Route::get('/encerrarSolicitacao/{idSolicitacao}', 'AdminAuth\AdminController@encerrarSolicitacao')->name('encerrarSolicitacao');


Route::get('/listaParaPagamentos','AdminAuth\FinanceiroController@escolhaSemestre2')->name('listaParaPagamentos');
Route::post('/listaParaPagamentos','AdminAuth\FinanceiroController@listaParaPagamentos')->name('listaParaPagamentos');

Route::get('/efetuar_pagamento/{idAluno}', 'AdminAuth\FinanceiroController@efetuarPagamento')->name('efetuarPagamento');
Route::get('/efetuar_pagamentoOk/{idMensalidade}', 'AdminAuth\FinanceiroController@efetuarPagamentoOk');
Route::get('/reverter_pagamento/{idMensalidade}', 'AdminAuth\FinanceiroController@reverterPagamento');


Route::get('/relatorioDeMensalidades','AdminAuth\FinanceiroController@escolhaSemestre2')->name('relatorioDeMensalidades');


Route::post('/relatorioDeMensalidades','AdminAuth\FinanceiroController@relatorioDeMensalidades')->name('relatorioDeMensalidades');
Route::any('/baixarRelatorio','AdminAuth\FinanceiroController@baixarRelatorio')->name('baixarRelatorio');
Route::post('/registrar_movimentacao', 'AdminAuth\FinanceiroController@registrarMovimentacao')->name('registrarMovimentacao');
Route::get('/historico_movimentacao/{mes?}/{ano?}', 'AdminAuth\FinanceiroController@historicoMovimentos')->name('historicoMovimentos');

Route::get('/apagarMovimento/{idMovimento}','AdminAuth\FinanceiroController@apagarMovimento')->name('apagarMovimento');


Route::get('/escolhaMes', 'AdminAuth\FinanceiroController@escolhaMes')->name('escolhaMes');
Route::post('/relatorioMovimentacao', 'AdminAuth\FinanceiroController@relatorioMovimentacao')->name('relatorioMovimentacao');
Route::get('/baixarRelatorioMovs','AdminAuth\FinanceiroController@baixarRelatorioMovs')->name('baixarRelatorioMovs');

Route::get('/historico_movimentacao/{mes}', 'AdminAuth\FinanceiroController@movimentoVue');

Route::get('/selecionar_Materia', 'AdminAuth\AdminController@selecionarMateria')->name('selecionarMateria');
Route::any('/alunosMateria', 'AdminAuth\AdminController@alunosMateria')->name('alunosMateria');
Route::get('/lancar_Notas/{idAluno}', 'AdminAuth\AdminController@lancarNotas')->name('lancarNotas');
Route::post('/lancar_Notas_Ok', 'AdminAuth\AdminController@lancarNotasOk')->name('lancarNotasOk');

Route::get('/lista_funcionarios', 'AdminAuth\AdminController@listaFunc')->name('listaFunc');
