<?php

namespace App\Providers;

use Auth;
use App\Admin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('cadastro', function(){
			$pass = false;
			if(Auth::user()->tipo == 'master'){
				$pass = true;
			}
			if(Auth::user()->tipo == 'administrativo'){
				$pass = true;
			}
			if(Auth::user()->tipo == 'secretaria'){
				$pass = true;
			}
			return $pass;
		});
		Gate::define('master', function(){
			$pass = false;
			if(Auth::user()->tipo == 'master'){
				$pass = true;
			}
            return $pass;
		});
		Gate::define('adm', function(){
			$pass = false;
			if(Auth::user()->tipo == 'master'){
				$pass = true;
			}
			if(Auth::user()->tipo == 'administrativo'){
				$pass = true;
			}
            return $pass;
		});

        Gate::define('academico', function(){
			$pass = false;
			if(Auth::user()->tipo == 'master'){
				$pass = true;
			}
			if(Auth::user()->tipo == 'administrativo'){
				$pass = true;
			}
			if(Auth::user()->tipo == 'secretaria'){
				$pass = true;
			}
			return $pass;
		});
		Gate::define('finance', function(){
			$pass = false;
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'master'){
				$pass = true;
			}
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'financeiro'){
				$pass = true;
			}
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'administrativo'){
				$pass = true;
			}
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'diretor'){
				$pass = true;
			}

			return $pass;
		});
        Gate::define('geral', function(){
			$pass = false;
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'master'){
				$pass = true;
			}
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'financeiro'){
				$pass = true;
			}
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'administrativo'){
				$pass = true;
			}
			return $pass;
		});
        Gate::define('relatoriosFinan', function(){
			$pass = false;
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'master'){
				$pass = true;
			}
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'financeiro'){
				$pass = true;
			}
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'administrativo'){
				$pass = true;
			}
			if(Auth::user()->local == 'rio' && Auth::user()->tipo == 'diretor'){
				$pass = true;
			}
			return $pass;
		});
        Gate::define('secretaria', function(){});
		Gate::define('rio', function(){
			return Auth::user()->local == 'rio';
		});

	}
}
