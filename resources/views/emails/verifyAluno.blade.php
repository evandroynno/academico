<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Email de verificação') }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<style>
	*{
		box-sizing: border-box;
	}
	.jumbotron{
		padding: 2rem 1rem
	}
	.display-4{
		font-size: 3.5rem;
		font-weight: 300;
		line-height: 1.2;
	}
	p{
		margin-top: 0;
		margin-bottom: 1rem
	}
	.lead{
		font-size: 1.25rem;
		font-weight: 300;
	}
	.my-4{
		margin-bottom: 1.5rem !important;
		margin-top: 1.5rem !important;
	}
	address{
		margin-bottom: 1rem;
		font-style: normal;
		line-height: inherit;
	}
	</style>
</head>

<body>
	<div class="jumbotron">
		<img src="{{ asset('img/logo.png') }}"><br>
		<h2 class="display-4">Bem vindo ao Pontifício Instituto Superior de Direito Canonico</h2>
		<p class="lead">Agradecemos o interesse em nossa graduação,<br>
		Para concluirmos o seu pedimos que entre em contato com a secretaria de nossa instituição
		</p>
		<p class="lead">Agradecemos o interesse em nossa graduação,</p>
		<hr class="my-4">
		<p>Para concluirmos o seu pedimos que entre em contato com a secretaria de nossa instituição</p>
		@switch($aluno['local'])
		@case('rio')
			<address>
				(21) 2516-5920<br>
				(21) 2516-5786<br>
				Av. Paulo de Frontin, 568 fundos – Rio Comprido<br>
				CEP 20261-243 Rio de Janeiro – RJ<br>
				contato@pisdc.org.br<br>
			</address>
			@break
		@case('londrina')
			<address>
				(43) 3774-1755<br>
				(43) 98804-1104<br>
				Rua Francisco Ferreira, 522 - Cafezal<br>
				CEP 86045-620 Londrina – PR<br>
				contato-londrina@pisdc.org.br<br>
			</address>
			@break
		@case('goiania')
			<address>
				(21) 2516-5920<br>
				(21) 2516-5786<br>
				Avenida Guarapari, 919 – Jardim Atlântico<br>
				CEP 74343-020 Goiânia – GO<br>
				contato@pisdc.org.br<br>
			</address>
			@break
		@default
			<address>
				(21) 2516-5920<br>
				(21) 2516-5786<br>
				Av. Paulo de Frontin, 568 fundos – Rio Comprido<br>
				CEP 20261-243 Rio de Janeiro – RJ<br>
				contato@pisdc.org.br<br>
			</address>
	@endswitch
	<br><br>
	Atenciosamente<br>

	Pontifício Instituto de Direito Canonico
	</div>
	{{-- <h3>Obrigado por se cadastrar, {{$aluno['name']}}</h3>
	<br/>
	Você acabou de se cadastrar no Pontificio Instituto de Direito Canonico<br/>
	Seu email de registro é {{$aluno['email']}}
	<br/>
	<a href="{{url("aluno/verify/".$verifyAluno['token'])}}">Confirmar Email</a> --}}
</body>

</html>
