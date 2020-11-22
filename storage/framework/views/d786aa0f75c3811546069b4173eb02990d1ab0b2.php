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
				<div class="card-header">Listas de alunos</div>
				<div class="card-body">
					<div class="row">
						<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7">
							<input type="text" name="busca" id="busca" placeholder="Buscar" class="form-control" data-list=".list">
						</div>
					</div>
					<ul class="list list-group list-group-flush">
						<?php $__empty_1 = true; $__currentLoopData = $alunos_pagantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aluno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<li class="list-group-item">
							<div class="row align-items-baseline">
								<div class="col-3">Matricula: <?php echo e(matriculaMask($aluno->matricula)); ?></div>
								<div class="col-6">Nome: <?php echo e($aluno->name); ?></div>
								<div class="col-3"><a href="<?php echo e(URL("admin/efetuar_pagamento/$aluno->id")); ?>" class="btn btn-primary text-white"><i class="fas fa-eye"></i> Ver</a></div>
							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<h4 class="text-center mt-2">Alunos não encontrados</h4>
						<?php endif; ?>
					</ul>
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