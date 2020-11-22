<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card bg-nav">
				<form action="<?php echo e(route('admin.relatorioMovimentacao')); ?>" method="POST">
					<?php echo csrf_field(); ?>
				<div class="card-header">Escolha o Mes</div>
				<div class="card-body">
					<div class="row justify-content-center">
						<div class="col-md-9">
							<input type="month" class="form-control" id="meseano" name="meseano" max="<?php echo e($mesano); ?>" value="<?php echo e($mesano); ?>" >
						</div>
					</div>
				</div>
				<div class="card-footer">
					<a href="<?php echo e(route('admin.home')); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					
					<button class="btn btn-primary" type="submit"><i class="fas fa-arrow-circle-right"></i> Avançar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>