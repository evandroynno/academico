@extends('layouts.app')
@section('guest_menu')
	<li class="nav-item">
		<a class="nav-link" href="{{ route('professor.login') }}">{{ __('Login') }}</a>
	</li>
@endsection
@section('menu')
	<a href="{{route('professor.alterSenha')}}" class="dropdown-item">Alterar Senha</a>
	<a class="dropdown-item" href="{{ route('professor.logout') }}"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();">
	{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('professor.logout') }}" method="POST" style="display: none;">
	@csrf
</form>

@endsection
