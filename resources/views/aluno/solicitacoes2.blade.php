@extends('aluno.layout.aluno')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<card cor="bg-nav" titulo="Solicitações" i="fas fa-align-justify" voltar="{{route('aluno.home')}}">
					<div class="row">
						<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7 text-right">
							<a href="{{route('aluno.novaSolicitacao')}}" class="btn btn-primary text-white">
								Nova Solicitação
							</a>
						</div>
					</div>
{{-- 					<div class="row">
						<div class="col-12">
							<div class="row bg-secundary">
								<div class="col-1">Tipo</div>
								<div class="col-1">Status</div>
								<div class="col-7">Mensagem</div>
								<div class="col-2">Criado em:</div>
							</div>
							@forelse($solicitacoes as $solicitacao)
								<div class="row border border-dark">
									<div class="col-1 text-capitalize text-nowrap">{{$solicitacao->tipo}}</div>
									<div class="col-1">{{$solicitacao->status}}</div>
									<div class="col-5">{{$solicitacao->mensagem}}
										@foreach($solicitacao->mensagens as $msg)
										<div class="border border-dark">
											@if($msg->name == Auth::user()->name)
												Eu - 
											@else
												{{$msg->name}} - 
											@endif

											{{mb_strimwidth($msg->mensagem,0,45,'...')}}<br/>
										</div>
										@endforeach
									</div>
									<div class="col-2">
										<button class="btn btn-primary"><i class="fas fa-plus"></i></button>
									</div>
									<div class="col-2">{{$solicitacao->created_at}}</div>
								</div>
							@empty
								<h3>Não há Solicitações</h3>
							@endforelse
						</div>
					</div>
 --}}
					<div class="table-responsive-lg">
						<table class="table table-hover">
							<thead>
								<tr>
									<th scope="col">Tipo</th>
									<th scope="col">Status</th>
									<th scope="col" colspan="2">Mensagem</th>
									<th scope="col">Criado em:</th>
								</tr>
							</thead>
							<tbody>
							@forelse($solicitacoes as $solicitacao)
								<tr>
									<td class="text-capitalize">{{$solicitacao->tipo}}</td>
									<td>{{$solicitacao->status}}</td>
									<td>
										@foreach($solicitacao->mensagens as $msg)
												@if($msg->name == Auth::user()->name)
													Eu - 
												@else
													{{$msg->name}} - 
												@endif

												{{$msg->mensagem}}<br/>
											@endif
										@endforeach
									</td>
									<td><button class="btn btn-primary"><i class="fas fa-plus"></i></button></td>
									<td><{{$solicitacao->created_at}}</td>
								</tr>
							@empty
							@endforelse
							</tbody>
						</table>
					</div>
				</card>
			</div>
		</div>
	</div>

<script type="text/javascript">
jQuery.fn.toggleText = function(a,b) {

return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));

}

$(document).ready(function(){

$('.tgl').before('<span><font color=red>more »</font></span>');

$('.tgl').css('display', 'none')

$('span', '#box-toggle').click(function() {

$(this).next().slideToggle('slow')

.siblings('.tgl:visible').slideToggle('fast');

// aqui começa o funcionamento do plugin

$(this).toggleText('more »','« less')

.siblings('span').next('.tgl:visible').prev()

.toggleText('more »','« less')

});

})
</script>

@endsection
