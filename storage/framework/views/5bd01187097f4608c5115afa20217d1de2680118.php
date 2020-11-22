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
		<?php if(session('error')): ?>
			<div class="row alert alert-danger" role="alert">
				<?php echo e(session('status')); ?>

				<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="card bg-nav">
					<div class="card-header"><i class="fas fa-align-justify"></i> Solicitações</div>
					<div class="card-body">
						<div class="row">
							<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7 text-right">
								<a href="<?php echo e(route('aluno.novaSolicitacao')); ?>" class="btn btn-primary text-white">
									Nova Solicitação
								</a>
							</div>
						</div>
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
								<?php $__empty_1 = true; $__currentLoopData = $solicitacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td class="text-nowrap text-capitalize"><?php echo e($solicitacao->tipo); ?></td>
										<td class="text-nowrap"><?php echo e($solicitacao->status); ?></td>
										<td class="text-nowrap">
											<?php $__currentLoopData = $solicitacao->mensagens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												 <?php if($loop->index % 2 == 0): ?>
												 <div class="row bg-white" >
												 <?php else: ?>
												 <div class="row" >
												 <?php endif; ?>
												 
													<div class="col-md-4">

														<?php if($msg->name == Auth::user()->name): ?>
															Eu
														<?php else: ?>
															<?php echo e($msg->name); ?>

														<?php endif; ?>
													</div>
													<div class="col-md-8 text-wrap" ><?php echo e($msg->mensagem); ?> </div>
												</div>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</td>
										<td class="text-nowrap">
											<?php if($solicitacao->status != "Encerrado"): ?>
												<button class="btn btn-primary" data-toggle="modal" data-target="#modal" data-solicitacao=<?php echo e($solicitacao->id); ?>><i class="fas fa-plus"></i></button>
											<?php endif; ?>
										</td>
										<td class="text-nowrap"><?php echo e($solicitacao->created_at); ?></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<tr>
										<td class="text-nowrap" colspan="5">
											<h3>Não Há solicitações</h3>
										</td>
									</tr>
								<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-6 offset-md-4"><a href="<?php echo e(route('aluno.home')); ?>" class="btn btn-primary"> <i class="fas fa-arrow-circle-left"></i> Voltar</a></div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="modal" tabindex="1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content bg-nav">
						<form action="<?php echo e(route('aluno.novaMensagem')); ?>" method="POST">
							<?php echo csrf_field(); ?>
						<div class="modal-header"><h5 class="modal-title">
							<i class="fas fa-comments"></i> Nova mensagem</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							
							<input type="hidden" name="solicitacao" id="solicitacao">
							<div class="form-group">
								<label for="message-text" class="col-form-label">Message:</label>
								<textarea class="form-control" id="message-text" name="mensagem"></textarea>
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

<?php echo $__env->make('aluno.layout.aluno', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>