<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
		<div class="row alert alert-success" role="alert">
			<?php echo e(session('status')); ?>

			<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card bg-nav">
				<div class="card-header">Historico de Transações</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-6">
						<?php if($ms): ?>
							<select name="mes" id="mes" class="form-control">
								<option value="" selected>Escolha o mês</option>
								<?php $__currentLoopData = $ms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($m->mesAno); ?>"><?php echo e($m->mesAno); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						<?php endif; ?>
						</div>
						<div class="col-sm-6">
							<button class="btn btn-primary float-right my-2 my-sm-0" data-toggle="modal" data-target="#modal"><i class="fas fa-plus"></i> Registrar transações</button>
						</div>
					</div>
					<table class="table table-bordered table-hover table-responsive-xl text-nowrap">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Tipo</th>
								<th>Valor</th>
								<th>Descrição</th>
								<th>Data</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php $__empty_1 = true; $__currentLoopData = $movs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td><?php echo e($mov->nome); ?></td>
									<td><?php echo e($mov->tipo=='E'?"Entrada":'Saída'); ?></td>
									<td class="font-weight-bolder <?php echo e($mov->tipo=='E'?'text-success':'text-danger'); ?>">R$<?php echo e(number_format($mov->valor,2,',','.')); ?></td>
									<td><?php echo e($mov->descricao); ?></td>
									<td><?php echo e(mes2($mov->data)); ?></td>
									<td>
										<?php if($mov->nome != "Mensalidade Paga"): ?>
											<a href="<?php echo e(URL("/admin/apagarMovimento/$mov->id")); ?>" class="btn btn-danger text-white" onclick="return confirm('Apagar este lançamento?')"><i class="fas fa-times"></i> Apagar</a>
										<?php endif; ?>

									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								sem registros
							<?php endif; ?>
								<tr>
									<th>Total:</th>
									<th></th>
									<th><?php echo e(number_format($total,2,',','.')); ?></th>
									<th></th>
									<th></th>
								</tr>
						</tbody>
					</table>
				</div>
				<div class="card-footer">
					<a href="<?php echo e(route('admin.home')); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal" tabindex="1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content bg-nav">
					<form action="<?php echo e(route('admin.registrarMovimentacao')); ?>" method="post" autocomplete="off">
						<?php echo csrf_field(); ?>
						<div class="modal-header">Transações</div>
						<div class="modal-body">
							<div class="custom-control custom-radio custom-control-inline mb-3">
								<input type="radio" id="Entrada" name="tipo" class="custom-control-input" value="E" onclick="mudarSinal('+')">
								<label class="custom-control-label" for="Entrada">Entrada</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="saida" name="tipo" class="custom-control-input" value="S" checked onclick="mudarSinal('-')">
								<label class="custom-control-label" for="saida">Saída</label>
							</div>
							<div class="form-row">
								<div class="col-sm-12 mb-3">
								<label for="nome">Nome da Transação</label>
								<input type="text" class="form-control" name="nome" id="nome" placeholder="Transação" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-sm-12 mb-3">
								<label for="valor">Valor</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="addon1">-</span>
									</div>
									<input type="text" class="form-control" id="valor" name='valor' placeholder="00,00" required>
								</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-sm-12 mb-3">
								<label for="data">Data</label>
								<input type="date" class="form-control" id="data" name='data' value="<?php echo e(date('Y-m-d')); ?>" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-sm-12 mb-3">
								<label for="nome">descrição</label>
								<textarea name="descricao" id="descricao" rows="3" class="form-control"></textarea>
								
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							<button class="btn btn-primary" type="submit">Enviar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
function mudarSinal(x){
	$('#addon1').html(x);
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>