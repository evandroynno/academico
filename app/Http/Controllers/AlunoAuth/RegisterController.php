<?php

namespace App\Http\Controllers\AlunoAuth;

use App\Aluno;
use App\VerifyAluno;
use App\State;
use App\City;
use Keygen\Keygen;
use Validator;
use Mail;
use App\Mail\VerifyMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Messages\MailMessage;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/aluno/home';

    /**
     *
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('aluno.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:alunos',
            'password' => 'required|min:6|confirmed',
            'dt_nasc' => 'required',
            'sexo' =>'required',
            'uf' => 'required',
            'cidade' => 'required',
            'perfil' => 'required',
            'telefone' => 'required',
			'local' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Aluno
     */
    protected function create(array $data)
    {
		switch ($data['local']) {
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
            'matricula' => date('Y').(date('n') > 3 && date('n') < 9 ?'02':'01'). $local.Keygen::numeric(3)->generate(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'dt_nasc' => $data['dt_nasc'],
            'sexo' => $data['sexo'],
            'uf' => $data['uf'],
            'cidade' => $data['cidade'],
            'perfil' => $data['perfil'],
            'telefone' => $data['telefone'],
            'local' => $data['local'],
        ]);

        Mail::to($aluno->email)->send(new VerifyMail($aluno));
        // Mail::to($aluno->email)->send(new MailMessage)->line('Isto é um Teste');

        return $aluno;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $ufs = State::orderBy('name','asc')->get();
        return view('aluno.auth.register',compact('ufs'));
    }

    public function verifyAluno($token)
    {
        $verifyAluno = VerifyAluno::where('token',$token)->first();
        if (isset($verifyAluno)) {
            $aluno = $verifyAluno->aluno;
            if($aluno->verified == 0){
                $verifyAluno->aluno->verified = 1;
                $verifyAluno->aluno->save();
                $status = 'Seu email foi confirmado. Você já pode fazer login';
            }else{
                $status = 'Seu email já foi confirmado. Você já pode fazer login';
            }
        }else{
            return redirect('aluno/login')->with('warding','Desculpe, seu email não pode ser identificado');
        }
        return redirect('aluno/login')->with('status',$status);
    }

    protected function registered(Request $request, Aluno $aluno)
    {
        $this->guard()->logout();
        return redirect('aluno/login')->with('status', 'Nós lhe enviamos um código de ativação. Verifique seu e-mail e clique no link para confirmar.');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('aluno');
    }
}
