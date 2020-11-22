<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
		<div class="row alert alert-primary" role="alert">
			<?php echo e(session('status')); ?>

		</div>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="card bg-nav">
				<div class="card-header"><i class="fas fa-dollar-sign"></i> Efetuar Pagamento Mensalidade</div>
				<div class="card-body">
					<div class="row my-2">
						<div class="col-12">
							<div class="row">
								<div class="col-6"><strong>Nome:</strong> <?php echo e($aluno->name); ?></div>
								<div class="col-6"><strong>Matrícula:</strong> <?php echo e($aluno->matricula); ?></div>
							</div>
							<div class="row">
								<div class="col-6"><strong>Creditos:</strong> <?php echo e($aluno->grades->first()->creditos); ?></div>
								<div class="col-6"><strong>Bolsa</strong> <?php echo e($aluno->bolsa? 'Sim ('.$aluno->bolsa->percentual.'%)' : 'Não'); ?></div>
							</div>
						</div>
					</div>
					<div class="container text-center bg-light">
						<div class="row align-items-baseline">
							<div class="col-2 mt-2 mb-2"><strong>Semestre</strong></div>
							<div class="col-1"><strong>Mês</strong></div>
							<div class="col-3"><strong>Data de Vencimento</strong></div>
							<div class="col-2"><strong>Valor</strong></div>
							<div class="col-3 text-center"><strong>Ação</strong></div>
						</div>
						<?php $__empty_1 = true; $__currentLoopData = $aluno->mensalidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensalidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<div class="row <?php echo e(\Carbon\Carbon::parse($mensalidade->data_venv) < $h && $mensalidade->pago == false ?'bg-danger text-white':''); ?><?php echo e($mensalidade->pago == true ?'bg-success text-white':''); ?> align-items-baseline">
								<div class="col-2"><?php echo e($mensalidade->semestre); ?></div>
								<div class="col-1"><?php echo e(mes($mensalidade->mes)); ?></div>
								<div class="col-3"><?php echo e(data($mensalidade->data_venv)); ?></div>
								<div class="col-2"><?php echo e(moeda($mensalidade->valor)); ?></div>
								<div class="col-3 text-center">
									<?php if(!$mensalidade->pago): ?>
										<a href="<?php echo e(URL("/admin/efetuar_pagamentoOk/$mensalidade->id")); ?>" class="btn btn-success text-white w-50" onclick="return confirm('Confirmar Pagamento?')"><i class="fas fa-dollar-sign"></i> Pagar</a>
									<?php else: ?>
										<a href="<?php echo e(URL("/admin/reverter_pagamento/$mensalidade->id")); ?>" class="btn btn-danger text-white w-50" onclick="return confirm('Reverter pagamento?')"><i class="fas fa-undo"></i> Reverter</a>

									<?php endif; ?>
									
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

						<?php endif; ?>
					</div>
				</div>
				<div class="card-footer">
					<a href="<?php echo e(route('admin.listaParaPagamentos')); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>