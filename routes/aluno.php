<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('aluno')->user();

    //dd($users);

    return view('aluno.home');
})->name('home');

Route::get('/verify/{token}','AlunoAuth\RegisterController@verifyAluno');
Route::get('/debug','AlunoAuth\AlunoController@debug');
Route::get('/editar', 'AlunoAuth\AlunoController@editarDados')->name('editarDados');
Route::post('/update', 'AlunoAuth\AlunoController@updateDados')->name('updateDados');

Route::get('/alterar_Senha','AlunoAuth\AlunoController@alterarSenha')->name('alterSenha');
Route::post('/alterar_Senha','AlunoAuth\AlunoController@alterarSenhaOk')->name('alterSenhaOk');


Route::get('/disciplinas', 'AlunoAuth\AlunoController@disciplinas')->name('disciplinas');
Route::get('/materiais', 'AlunoAuth\AlunoController@materiais')->name('material');
Route::get('/notas', 'AlunoAuth\AlunoController@notas')->name('notas');

Route::get('/consultarPagamento','AlunoAuth\AlunoController@consultarPagamento')->name('consultarPagamento');
Route::get('/solicitacoes','AlunoAuth\AlunoController@solicitacoes')->name('solicitacoes');
Route::get('/novaSolicitacao', 'AlunoAuth\AlunoController@novaSolicitacao')->name('novaSolicitacao');
Route::post('/novaSolicitacao', 'AlunoAuth\AlunoController@novaSolicitacaoOk')->name('novaSolicitacao');
Route::post('/novaMensagem','AlunoAuth\AlunoController@novaMensagem')->name('novaMensagem');