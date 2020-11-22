@extends('aluno.layout.aluno')

@section('content')
<div class="container">
    <div class="row justify-content-center">
		<div class="col-md-12">
			<form action="{{route('aluno.updateDados')}}" method="post">
				@csrf
				<card titulo="Informções do Usuário" i="fas fa-user" cor="bg-nav" voltar="{{route('aluno.home')}}" submit="Salvar">
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
								<label for="telefone" class="col-md-3 col-form-label text-md-right">Telefone</label>
								<div class="col-md-9">
									<input type="tel" name="telefone" id="telefone" class="form-control" value="{{Auth::user()->telefone}}">
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group row">
								<label class="col-md-5 col-form-label text-md-right">Nova Senha</label>
								<div class="col-md-6">
									<input name='password' id="password" type="password" class="form-control" value="" placeholder="Digite Nova Senha">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-md-5 col-form-label text-md-right">Confirme Nova Senha</label>
								<div class="col-md-6">
									<input name='password' id="confirm_password" type="password" class="form-control" value="" placeholder="Confirme Nova Senha">
								</div>
							</div>
						</div>
					</div>
				</card>
			</form>
		</div>
    </div>
</div>
@endsection
