<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet"> --}}
</head>
<body>
    <div id="app">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-12 col-md-8"><img src="{{ asset('img/logo.png')}}"></div>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark bg-nav navbar-laravel">
            <div class="container">

                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
						@guest
							@yield('guest_menu')
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @yield('matricula'){{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
			@yield('content')
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-sm-6 col-md-4 my-4">
						<a href="{{route('login')}}" class="btn text-white bg-nav w-100"><h2><i class="fas fa-graduation-cap"></i> Aluno</h2></a>
					</div>
					<div class="col-sm-6 col-md-4 my-4">
						<a href="{{route('professor.login')}}" class="btn text-white bg-nav w-100"><h2><i class="fas fa-chalkboard-teacher"></i> Professor</h2></a>
					</div>
					<div class="col-sm-6 col-md-4 my-4">
						<a href="{{route('admin.login')}}" class="btn text-white bg-nav w-100"><h2><i class="fas fa-user-cog"></i> Administração</h2></a>
					</div>
				</div>

			</div>
        </main>
        <div class="rdp"></div>
        <footer class="bg-nav text-center py-2">
            ©{{ date('Y') }} {{ config('app.name') }}. @lang('Todos direitos resevados') - Criado por Evandro Magalhães
        </footer>

    </div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/sistema.js') }}" defer></script>
<script src="{{asset('js/vendor/jquery.hideseek.js')}}" defer></script>
<script src="{{asset('js/select2.js')}}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous" defer></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js" defer></script>
@yield('script')
</html>
