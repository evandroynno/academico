@extends('admin.layout.admin')

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
				<form method="POST" action="{{ route('admin.cadAlunoOk') }}" aria-label="Cadastrar Aluno">
					@csrf
					<div class="card-header">Cadastrar Aluno</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
							<div class="col-md-6">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Ex.: João Silva" required autofocus>
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
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Ex.: usuario@provedor.com" required autofocus>
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
								<input type="date" name="dt_nasc" id="dt_nasc" min="1918-01-01" class="form-control" value="{{ old('dt_nasc') }}" autofocus>
							</div>
						</div>
						<div class="form-group row">
							<label for="uf" class="col-md-4 col-form-label text-md-right">UF</label>
							<div class="col-md-6">
								<select name="uf" id="uf" class="form-control" autofocus>
									<option value="">Escolha um Estado</option>
									@foreach ($ufs as $uf)
										<option value="{{$uf->id}}" {{old('uf')==$uf->id?'selected':''}} >{{$uf->name}} - {{$uf->abbr}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="cidade" class="col-md-4 col-form-label text-md-right">Cidade</label>
							<div class="col-md-6">
								@php
									if(old('uf')){
										$uf = old('uf');
										echo '<script>window.onload = function(){getCidades('.$uf.')}</script>';
									}
								@endphp
								<select name="cidade" id="cidade" class="form-control" disabled>
									<option>Escolha um estado primeiro</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="sexo" class="col-md-4 col-form-label text-md-right">Genero</label>
							<div class="col-md-6">
								<label class='col-5' for="sexo-m"><input id="sexo-m" type="radio" class="form-check-input" name="sexo" value="m" {{old('sexo')=='m'?'checked':''}}>Masculino</label>
								<label class='col-5' for="sexo-f"><input id="sexo-f" type="radio" class="form-check-input" name="sexo" value="f" {{old('sexo')=='m'?'checked':''}}>Feminino</label>
							</div>
						</div>
						<div class="form-group row">
							<label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>
							<div class="col-md-6">
								<input type="text" name="telefone" id="telefone" class="form-control" value="{{old('telefone')}}" placeholder="Ex.: (00) 0000-0000">
							</div>
						</div>
						{{-- div.form-group.row>label[for=telefone].col-md-4.col-form-label+div.col-md-6 --}}

						<div class="form-group row">
							<label for="perfil" class="col-md-4 col-form-label text-md-right">Perfil</label>
							<div class="col-md-6">
								<select name="perfil" id="perfil" class="form-control">
									<option value="">Escolha</option>
									<option value="leigo" {{old('perfil')=='leigo'? 'selected':''}}>Leigo</option>
									<option value="religioso" {{old('perfil')=='religioso'? 'selected':''}}>Religioso</option>
									<option value="sacerdote" {{old('perfil')=='sacerdote'? 'selected':''}}>Sacerdote</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="local" class="col-md-4 col-form-label text-md-right">Local do Curso</label>
							<div class="col-md-6">
								<select name="local" id="local" class="form-control">
									<option value="">Escolha o local</option>
									<option value="rio" {{old('local')=='rio'? 'selected':''}}>Rio de Janeiro - RJ</option>
                                    <option value="londrina" {{old('local')=='londrina'? 'selected':''}}>Londrina - PR</option>
                                    <option value="goiania" {{old('local')=='goiania'? 'selected':''}}>Goiania - GO</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
							<div class="col-md-6">
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus>
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
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="form-group row mb-0">
							<div class="col-md-4 offset-md-8">
								<a href="{{route('admin.home')}}" class="btn btn-primary text-white">Voltar</a>
								<button type="submit" class="btn btn-primary">
									Cadastrar
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="{{ asset('js/sistema.js') }}" type="text/javascript"></script> --}}
@endsection
