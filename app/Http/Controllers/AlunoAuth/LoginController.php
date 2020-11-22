<?php

namespace App\Http\Controllers\AlunoAuth;

use App\Aluno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, LogsoutGuard {
        LogsoutGuard::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/aluno/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('aluno.guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('aluno.auth.login');
    }

    public function authenticated(Request $request, $aluno){
        $email = $request->email;
        $aluno = Aluno::where('email', $email)->first();
        if (!$aluno->verified) {
            // dd($aluno->verified);
            auth('aluno')->logout();
            return back()->with('warning', 'Você precisa confirmar sua conta. Enviamos um código de ativação para você. Por favor, verifique seu e-mail.');
        }else {
            return redirect()->intended($this->redirectPath());
        }
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('aluno');
    }
}
