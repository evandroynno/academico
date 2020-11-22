<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('professor')->user();

    // dd($users);
    // dd(Auth::user()->disciplinas->all());

    return view('professor.home');
})->name('home');

Route::get('/alterar_Senha','ProfessorAuth\ProfessorController@alterarSenha')->name('alterSenha');
Route::post('/alterar_Senha','ProfessorAuth\ProfessorController@alterarSenhaOk')->name('alterSenhaOk');

Route::get('/editar_dados','ProfessorAuth\ProfessorController@editarDados')->name('editarDados');
Route::post('/update_dados','ProfessorAuth\ProfessorController@updateDados')->name('updateDados');

Route::get('/lista_de_presenca', 'ProfessorAuth\ProfessorController@selecionarData')->name('selecionarData');
Route::post('/lista_de_presenca', 'ProfessorAuth\ProfessorController@listaDeAlunos')->name('listarAlunos');
Route::post('/salvar_presenca', 'ProfessorAuth\ProfessorController@salvarPresenca')->name('salvarPresenca');

Route::get('/lista_de_Material','ProfessorAuth\ProfessorController@listMaterial')->name('listMaterial');
Route::get('/cadastrar_Material','ProfessorAuth\ProfessorController@cadMaterial')->name('cadMaterial');
Route::post('/cadastrar_Material','ProfessorAuth\ProfessorController@cadMaterialOk')->name('cadMaterialOk');
Route::get('/deletar_material/{idMaterial}','ProfessorAuth\ProfessorController@delMaterial');

Route::get('/selecionar_Disciplina', 'ProfessorAuth\ProfessorController@selecionarDisciplina')->name('selecionarDisciplina');
Route::post('/alunosMateria', 'ProfessorAuth\ProfessorController@alunosMateria')->name('alunosMateria');
Route::get('/alunosMateria', 'ProfessorAuth\ProfessorController@alunosMateria')->name('alunosMateria');
Route::get('/lancar_Notas/{idAluno}', 'ProfessorAuth\ProfessorController@lancarNotas2')->name('lancarNotas');
Route::post('/lancar_Notas_Ok', 'ProfessorAuth\ProfessorController@lancarNotasOk')->name('lancarNotasOk');
