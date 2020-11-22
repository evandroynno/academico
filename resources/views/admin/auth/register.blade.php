@extends('admin.layout.admin')

@section('content')
<div class="container">
		@if (session('status'))
		<div class="row alert alert-info" role="alert">
			{{ session('status') }}
		</div>
	@endif
	@if (session('error'))
		<div class="row alert alert-info" role="alert">
			{{ session('error') }}
		</div>
	@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-nav text-white">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form action="{{url('/admin/register')}}" method="post" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required autofocus>

                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" class="form-control{{$errors->has('email') ? ' is-invalid' : ''}}" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>
                            <div class="col-md-6">
                                <input type="text" name="telefone" id="telefone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="local" class="col-md-4 col-form-label text-md-right">Local de Atuação</label>
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
                            <label for="dt_nasc" class="col-md-4 col-form-label text-md-right">Data de Nascimento</label>
                            <div class="col-md-6">
                                <input type="date" name="dt_nasc" id="dt_nasc" min="1918-01-01" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="setor" class="col-md-4 col-form-label text-md-right">Setor</label>
                            <div class="col-md-6">
                                <input type="text" name="setor" id="setor" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo de acesso</label>
                            <div class="col-md-6">
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="">Escolha o Tipo de acesso</option>
                                    <option value="secretaria">Secretaria</option>
                                    <option value="financeiro">Financeiro</option>
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
<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script>
    var maskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
    },
    options = {
        onKeyPress:
            function(val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);
            }
    };
    $('#telefone').mask(maskBehavior, options);

</script>
@endsection
