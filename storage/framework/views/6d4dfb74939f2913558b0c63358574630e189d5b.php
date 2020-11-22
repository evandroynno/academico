<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="card bg-nav">
					<div class="card-header"></div>
					<div class="card-body">
						<div class="row">
							<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7 text-right">
								<a href="<?php echo e(route('admin.baixarRelatorio')); ?>" class="btn btn-primary text-white" target="_blank"><i class="fas fa-download"></i> Salvar em PDF</a>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped table-responsive">
								<thead>
									<tr>
										<th class="text-nowrap" scope="col">Nome</th>
										<th class="text-nowrap" scope="col">Valor Mensal</th>
										<th class="text-nowrap" scope="col">Valor do semestre</th>
										<?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<th class="text-nowrap" scope="col"><?php echo e(mes($mes)); ?></th>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<th class="text-nowrap" scope="col">Recebido</th>
										<th class="text-nowrap" scope="col">Subtotal</th>
										<th class="text-nowrap" scope="col">Credito</th>
										<th class="text-nowrap" scope="col">Em Aberto</th>
									</tr>
								</thead>
								<tbody class="list">
									<?php $__currentLoopData = $alunos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aluno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($aluno->gradesAtual != null && $aluno->gradesAtual->creditos != 0): ?>
									<tr>
										<?php
											$i=0
										?>
										<td class="text-nowrap"><?php echo e($aluno->name); ?></td>
										<td class="text-nowrap">
											<?php if($aluno->bolsa != null): ?>
												<?php echo e(valorBolsista($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])); ?>

											<?php else: ?>
												<?php echo e(valorMensal($aluno->gradesAtual->creditos)); ?>

											<?php endif; ?>
										</td>
										<td class="text-nowrap">
											<?php if($aluno->bolsa != null): ?>
												R$ <?php echo e((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*6); ?>,00
											<?php else: ?>
												R$ <?php echo e((int)valorMensalDB($aluno->gradesAtual->creditos)*6); ?>,00
											<?php endif; ?>
										</td>
										<?php $__currentLoopData = $aluno->mensalidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensalidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($aluno->bolsa != null && $aluno->bolsa['percentual'] == '100'): ?>
											<td class="bg-secondary">
												Isento
											</td>
										<?php elseif($mensalidade->pago): ?>
											<td class="bg-success">
												Pago
											</td>
										<?php else: ?>
											<td class="text-nowrap">Em Aberto</td>
										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<td class="text-nowrap">
											
											<?php $__currentLoopData = $aluno->mensalidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensalidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($mensalidade->pago): ?>
												<?php
													$i++;
												?>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											<?php if($aluno->bolsa != null): ?>
												R$<?php echo e((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*$i); ?>,00
											<?php else: ?>
												R$<?php echo e((int)valorMensalDB($aluno->gradesAtual->creditos)*$i); ?>,00
											<?php endif; ?>

										</td>
										<td class="text-nowrap">
											<?php if($aluno->bolsa != null): ?>
												R$<?php echo e(((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*6)-((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*$i)); ?>,00
											<?php else: ?>
												R$<?php echo e(((int)valorMensalDB($aluno->gradesAtual->creditos)*6)-((int)valorMensalDB($aluno->gradesAtual->creditos)*$i)); ?>,00
											<?php endif; ?>
										</td>
										<td class="text-nowrap"></td>
										<td class="text-nowrap"></td>
									</tr>
									<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<a href="<?php echo e(route('admin.home')); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>