@extends('layouts.app')
@section('guest_menu')
	<li class="nav-item">
		<a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
	</li>
@endsection
@section('menu')
	<a href="{{route('admin.alterSenha')}}" class="dropdown-item">Alterar Senha</a>
	<a class="dropdown-item" href="{{ route('admin.logout') }}"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();">
	{{ __('Logout') }}
	</a>

	<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
		@csrf
	</form>
@endsection
