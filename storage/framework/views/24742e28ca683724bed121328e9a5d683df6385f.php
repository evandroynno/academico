<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<card cor="bg-nav" i='fas fa-dollar-sign' titulo="Informações de pagamentos" voltar="<?php echo e(route('aluno.home')); ?>">
					<div class="row my-2">
						<div class="col-12">
							<div class="row">
								<div class="col-6"><strong>Nome:</strong> <?php echo e($aluno->name); ?></div>
								<div class="col-6"><strong>Matrícula:</strong> <?php echo e($aluno->matricula); ?></div>
							</div>
							<div class="row">
								<div class="col-6"><strong>Creditos:</strong> <?php echo e($aluno->gradesAtual->creditos); ?></div>
								<div class="col-6"><strong>Bolsa</strong> <?php echo e($aluno->bolsa? 'Sim ('.$aluno->bolsa->percentual.'%)' : 'Não'); ?></div>
							</div>
						</div>
					</div>
					<div class="container text-center bg-light">
						<div class="row align-items-baseline">
							<div class="col-2 mt-2 mb-2"><strong>Semestre</strong></div>
							<div class="col-2"><strong>Mês</strong></div>
							<div class="col-3"><strong>Data de Vencimento</strong></div>
							<div class="col-2"><strong>Valor</strong></div>
							<div class="col-3"><strong>Status</strong></div>

						</div>
						<?php $__empty_1 = true; $__currentLoopData = $aluno->mensalidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensalidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<div class="row <?php echo e(\Carbon\Carbon::parse($mensalidade->data_venv) < $h && $mensalidade->pago == false ?'bg-danger text-white':''); ?><?php echo e($mensalidade->pago == true ?'bg-success text-white':''); ?> align-items-baseline">
								<div class="col-2"><?php echo e($mensalidade->semestre); ?></div>
								<div class="col-2"><?php echo e(mes($mensalidade->mes)); ?></div>
								<div class="col-3"><?php echo e(data($mensalidade->data_venv)); ?></div>
								<div class="col-2"><?php echo e(moeda($mensalidade->valor)); ?></div>
								<div class="col-3">
									<?php if(\Carbon\Carbon::parse($mensalidade->data_venv) < $h && $mensalidade->pago == false): ?>
										Em atraso
									<?php elseif($mensalidade->pago == true): ?>
										Pago
									<?php else: ?>
										Em aberto
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

						<?php endif; ?>
					</div>
				</card>
				
			</div>
		</div>
	</div>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('aluno.layout.aluno', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>