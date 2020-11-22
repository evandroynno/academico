@extends('layouts.app')

@section('guest_menu')
<li class="nav-item">
	<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
<li class="nav-item">
	<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
</li>

@endsection
@section('matricula')
	@isset(Auth::user()->matricula)
		{{ Auth::user()->matricula }} -
	@endisset
@endsection
@section('menu')
	<a href="{{route('aluno.alterSenha')}}" class="dropdown-item">Alterar Senha</a>
	<a class="dropdown-item" href="{{ route('logout') }}"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();">
	{{ __('Logout') }}
	</a>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		@csrf
	</form>

@endsection
