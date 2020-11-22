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
		<div class="col-8">
			<div class="card bg-nav">
				<form action="{{ route('admin.cadProfOk') }}" method="post" aria-label="Cadastrar Profesor">
				@csrf
					<div class="card-header">Cadastrar Professor</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
							<div class="col-md-6">
								<input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Ex.: João Silva" value="{{ old('name') }}">
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
								<input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Ex.: usuario@provedor.com" value="{{ old('email') }}">
								@if($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>
							<div class="col-md-6">
								<input type="tel" name="telefone" id="telefone" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" placeholder="Ex.: (00) 0000-0000" value="{{ old('telefone') }}">
								@if($errors->has('telefone'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('telefone') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
							<div class="col-md-6">
								<input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Insira a senha">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    	<strong>{{ $errors->first('password') }}</strong>
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
						@can('adm', Auth::user())
							<div class="form-group row">
								<label for="local" class="col-md-4 col-form-label text-md-right">Local</label>
								<div class="col-md-6">
									<select name="local" id="local" class="form-control">
										<option value="">Escolha uma opção</option>
										<option value="rio" {{old('local')=='rio'? 'selected':''}}>Rio de Janeiro</option>
										<option value="londrina" {{old('local')=='londrina'? 'selected':''}}>Londrina</option>
										<option value="goiania" {{old('local')=='goiania'? 'selected':''}}>Goiania</option>
									</select>
								</div>
							</div>
						@endcan
						<div class="form-group row">
							<label for="eclesialidade" class="col-md-4 col-form-label text-md-right">Eclesialidade</label>
							<div class="col-md-6">
								<select name="eclesialidade" id="eclesialidade" class="form-control">
									<option value="">Escolha uma opção</option>
									<option value="leigo" {{old('eclesialidade')=='leigo'? 'selected':''}}>Leigo</option>
									<option value="clerigo" {{old('eclesialidade')=='clerigo'? 'selected':''}}>Clerigo</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="dt_nasc" class="col-md-4 col-form-label text-md-right">Data de Nascimento</label>
							<div class="col-md-6">
								<input type="date" name="dt_nasc" id="dt_nasc" min="1918-01-01" class="form-control" value="{{old('dt_nasc')}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="titulo" class="col-md-4 col-form-label text-md-right">Titulação Acadêmica</label>
							<div class="col-md-6">
								<input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulação Acadêmica" value="{{old('titulo')}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="especializacao" class="col-md-4 col-form-label text-md-right">Especialiação</label>
							<div class="col-md-6">
								<input type="text" name="especializacao" id="especializacao" value="{{old('esecializacao')}}" class="form-control" placeholder="Especialiação">
							</div>
						</div>
						<div class="form-group row">
							<label for="instituicao" class="col-md-4 col-form-label text-md-right">Instituição</label>
							<div class="col-md-6">
								<input type="text" name="instituicao" id="instituicao" value="{{old('instituicao')}}" class="form-control" placeholder="Instituição">
							</div>
						</div>
						<div class="form-group row">
							<label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
							<div class="col-md-6">
								<select name="status" id="status" class="form-control">
									<option value="">Escolha uma opção</option>
									<option value="lecionando" {{old('status')=='lecionando'? 'selected':''}}>Lecionando</option>
									<option value="ativo" {{old('status')=='ativo'? 'selected':''}}>Ativo</option>
									<option value="inativo" {{old('status')=='inativo'? 'selected':''}}>Inativo</option>
								</select>
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
@endsection
