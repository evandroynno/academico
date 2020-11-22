@extends('admin.layout.admin')

@section('content')
<div class="container">
	@if (session('status'))
	<div class="row alert alert-info alert-dismissible fade show" role="alert">
		<strong>{{ session('status') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card bg-nav text-white w-100">
				<form action="{{ url('/admin/cadastrar_Funcionario') }}" method="post" aria-label="Cadastrar Funcionario">
					@csrf
					<div class="card-header">Cadastrar Funcionário</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">Nome Completo</label>
							<div class="col-md-6">
								<input name='name' id="name" type="text" class="form-control{{$errors->has('name')?' is-invalid':''}}" value="{{old('name')}}" required autofocus placeholder="Ex.: João Silva">
								@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{$errors->first('name')}}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
							<div class="col-md-6">
								<input name='email' id="email" type="text" placeholder="Ex.: usuario@provedor.com" class="form-control{{$errors->has('email')?' is-invalid':''}}" value="{{old('email')}}" required autofocus>
								@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{$errors->has('email')}}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>
							<div class="col-md-6">
								<input class="form-control{{$errors->has('telefone')?' is-invalid':''}}" type="text" name="telefone" id="telefone" placeholder="(00) 90000-0000" value="{{old('telefone')}}" required autofocus>
								@if ($errors->has('telefone'))
									<span class="invalid-feedback" role="alert">
										<strong>{{$errors->has('telefone')}}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo de acesso</label>
							<div class="col-md-6">
								<select name="tipo" id="tipo" class="form-control">
									<option value="">Escolha o tipo de acesso</option>
									<option value="financeiro" {{old('tipo')=='financeiro'?'selected':''}}>Financeiro</option>
									<option value="secrataria" {{old('tipo')=='secrataria'?'selected':''}}>Secretaria</option>
									<option value="administrativo" {{old('tipo')=='administrativo'?'selected':''}}>Administrativo</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="dt_nasc" class="col-md-4 col-form-label text-md-right">Data de Nascimento</label>
							<div class="col-md-6">
								<input type="date" name="dt_nasc" value="{{old('dt_nasc')}}" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Senha</label>
							<div class="col-md-6">
								<input name='password' type="password" class="form-control{{$errors->has('password')?' is-invalid':''}}" placeholder="Insira a senha">
								@if ($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong>{{$errors->has('password')}}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Confirme Nova Senha</label>
							<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme Nova Senha">
							</div>
						</div>
						@can('master', Auth::user())
							<div class="form-group row">
								<label for="local" class="col-md-4 col-form-label text-md-right">Local</label>
								<div class="col-md-6">
									<select name="local" id="local" class="form-control">
										<option value="rio" selected>Rio</option>
										<option value="goiania">Goiania</option>
										<option value="londrina">Londrina</option>
									</select>
								</div>
							</div>
						@endcan
					</div>
					<div class="card-footer">
						<div class="form-group row mb-0">
							<div class="col-md-3 offset-md-9">
								<a href="{{route('admin.home')}}" class="btn btn-primary text-white">Voltar</a>
								<button type="submit" class="btn btn-primary">
									Salvar
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
