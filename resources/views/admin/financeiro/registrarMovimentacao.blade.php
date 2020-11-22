@extends('admin.layout.admin')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card bg-nav">
				<form action="">
					<div class="card-header">Cadastrar Movimentação</div>
					<div class="card-body">
						<div class="custom-control custom-radio custom-control-inline mb-3">
							<input type="radio" id="Entrada" name="tipo" class="custom-control-input">
							<label class="custom-control-label" for="Entrada">Entrada</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="saida" name="tipo" class="custom-control-input">
							<label class="custom-control-label" for="saida">Saída</label>
						</div>
						<div class="form-row">
							<div class="col-sm-10 mb-3">
							<label for="nome">Nome da Transação</label>
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Transação" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-10 mb-3">
							<label for="valor">Valor</label>
							<input type="text" class="form-control" id="valor" name='valor' placeholder="00,00" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-10 mb-3">
							<label for="data">Data</label>
							<input type="date" class="form-control" id="data" name='data' value="{{date('Y-m-d')}}" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col-sm-10 mb-3">
							<label for="nome">descrição</label>
							<textarea name="descricao" id="descricao" rows="3" class="form-control"></textarea>
							{{-- <input type="text" class="form-control" id="Valor" placeholder="00,00" required> --}}
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-primary" type="submit">Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
