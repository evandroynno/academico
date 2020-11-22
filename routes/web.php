<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getCidades/{state_id}','GeralController@getCidades');
Route::get('/getNotas/{aluno_id}','GeralController@getNotas');
Route::get('/getDisciplina/{codDisciplina}','GeralController@getDisciplina');

Route::group(['prefix' => 'admin'], function () {

  Route::get('/', 'AdminAuth\LoginController@showLoginForm');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
//   Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
//   Route::post('/register', 'AdminAuth\RegisterController@register');

});

Route::group(['prefix' => 'aluno'], function () {
  Route::get('/', 'AlunoAuth\LoginController@showLoginForm');
  Route::get('/login', 'AlunoAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AlunoAuth\LoginController@login');
  Route::post('/logout', 'AlunoAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AlunoAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AlunoAuth\RegisterController@register');

  Route::post('/password/email', 'AlunoAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AlunoAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AlunoAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AlunoAuth\ResetPasswordController@showResetForm');

});

Route::group(['prefix' => 'professor'], function () {
  Route::get('/', 'ProfessorAuth\LoginController@showLoginForm');
  Route::get('/login', 'ProfessorAuth\LoginController@showLoginForm')->name('professor.login');
  Route::post('/login', 'ProfessorAuth\LoginController@login');
  Route::post('/logout', 'ProfessorAuth\LoginController@logout')->name('professor.logout');

  Route::post('/password/email', 'ProfessorAuth\ForgotPasswordController@sendResetLinkEmail')->name('professor.password.request');
  Route::get('/password/reset', 'ProfessorAuth\ForgotPasswordController@showLinkRequestForm')->name('professor.password.reset');
  Route::post('/password/reset', 'ProfessorAuth\ResetPasswordController@reset')->name('professor.password.email');
  Route::get('/password/reset/{token}', 'ProfessorAuth\ResetPasswordController@showResetForm');
});
