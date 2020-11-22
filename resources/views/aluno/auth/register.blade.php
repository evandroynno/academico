@extends('aluno.layout.aluno')

@section('content')
<div class="container">
	@if (session('status'))
		<div class="row alert alert-info" role="alert">
			<strong>{{ session('status') }}</strong>
		</div>
	@endif

	@if (session('error'))
		<div class="row alert alert-danger" role="alert">
			<strong>{{session('error')}}</strong>
		</div>
	@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-nav text-white">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/aluno/register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dt_nasc" class="col-md-4 col-form-label text-md-right">Data de Nascimento</label>
                            <div class="col-md-6">
								<input type="date" name="dt_nasc" id="dt_nasc" min="1918-01-01" class="form-control{{$errors->has('dt_nasc')? ' is-invalid':''}}" value="{{old('dt_nasc')}}" required>
								@if ($errors->has('dt_nasc'))
									<span class="invalid-feedback" role="alert">
										<strong>{{$errors->first('dt_nasc')}}</strong>
									</span>
								@endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="uf" class="col-md-4 col-form-label text-md-right">UF</label>
                            <div class="col-md-6">
                                <select name="uf" id="uf" class="form-control">
                                    <option>Escolha um Estado</option>
                                    @foreach ($ufs as $uf)
                                        <option value="{{$uf->id}}">{{$uf->name}} - {{$uf->abbr}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right">Cidade</label>
                            <div class="col-md-6">
                                <select name="cidade" id="cidade" class="form-control" disabled>
                                    <option>Escolha um estado primeiro</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">Genero</label>
                            <div class="col-md-6">
                                <label class='col-5' for="sexo-m"><input id="sexo-m" type="radio" class="form-check-input" name="sexo" value="m">Masculino</label>
                                <label class='col-5' for="sexo-f"><input id="sexo-f" type="radio" class="form-check-input" name="sexo" value="f">Feminino</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>
                            <div class="col-md-6">
                                <input type="text" name="telefone" id="telefone" class="form-control{{$errors->has('telefone')? ' is-invalid':''}}">
                                @if ($errors->has('telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- div.form-group.row>label[for=telefone].col-md-4.col-form-label+div.col-md-6 --}}

                        <div class="form-group row">
                            <label for="perfil" class="col-md-4 col-form-label text-md-right">Perfil</label>
                            <div class="col-md-6">
                                <select name="perfil" id="perfil" class="form-control">
                                    <option value="">Escolha</option>
                                    <option value="leigo">Leigo</option>
                                    <option value="religioso">Religioso</option>
                                    <option value="sacerdote">Sacerdote</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="local" class="col-md-4 col-form-label text-md-right">Local do Curso</label>
                            <div class="col-md-6">
                                <select name="local" id="local" class="form-control">
                                    <option value="">Escolha o local</option>
                                    <option value="rio">Rio de Janeiro - RJ</option>
                                    <option value="londrina">Londrina - PR</option>
                                    <option value="goiania">Goiania - GO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous" defer></script> --}}
{{-- <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
{{-- <script src="{{ asset('js/sistema.js') }}" type="text/javascript"></script> --}}
@endsection
