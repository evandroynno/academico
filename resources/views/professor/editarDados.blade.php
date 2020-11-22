@extends('professor.layout.professor')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card w-100 bg-nav">
			<form action="{{route('professor.updateDados')}}" method="post">
				@csrf
				<div class="card-header text-white"><i class="fas fa-user"></i> Informações do Usuário</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-7 border-right border-danger">
							<div class="form-group row">
								<label for="name" class="col-md-3 col-form-label text-md-right">Nome Completo</label>
								<div class="col-md-9">
									<input name='name' id="name" type="text" class="form-control" value="{{Auth::user()->name}}">
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
								<div class="col-md-9">
									<input name='email'  type="text" class="form-control" value="{{Auth::user()->email}}" disabled>
								</div>
							</div>
							<div class="form-group row">
								<label for="titulo" class="col-md-3 col-form-label text-md-right">Titulação Acadêmica</label>
								<div class="col-md-9">
									<input type="text" name="titulo" id="titulo" class="form-control" value="{{Auth::user()->titulo}}">
								</div>
							</div>
							<div class="form-group row">
								<label for="especializacao" class="col-md-3 col-form-label text-md-right">Especialização</label>
								<div class="col-md-9">
										<input type="text" name="especializacao" id="especializacao" class="form-control" value="{{Auth::user()->especializacao}}">
								</div>
							</div>
							<div class="form-group row">
								<label for="eclesialidade" class="col-md-3 col-form-label text-md-right text-capitalize">Eclesialidade</label>
								<div class="col-md-9">
										<input type="text" name="eclesialidade" id="eclesialidade" class="form-control" value="{{Auth::user()->eclesialidade}}">
								</div>
							</div>
							<div class="form-group row">
								<label for="instituicao" class="col-md-3 col-form-label text-md-right text-capitalize">Instituição</label>
								<div class="col-md-9">
										<input type="text" name="instituicao" id="instituicao" class="form-control" value="{{Auth::user()->instituicao}}">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group row">
								<label class="col-md-5 col-form-label text-md-right">Nova Senha</label>
								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password">
									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-5 col-form-label text-md-right">Confirme Nova Senha</label>
								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation">
									@if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
	                                @endif
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="form-group row mb-0">
						<div class="col-md-8 offset-md-4">
							<a href="{{route('professor.home')}}" class="btn btn-primary text-white">Voltar</a>
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
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Senhas diferentes!");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>
@endsection
