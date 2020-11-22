<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">

			<div class="bg-nav">
				<div class="card-header"><i class="fas fa-book"></i> Lista de Material on-line</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<?php $__empty_1 = true; $__currentLoopData = $materiais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<li class="list-group-item">
								<div class="row">
									<div class="col-md-4"><strong>Material:</strong> <?php echo e($material->name); ?></div>
									<div class="col-md-2"><strong>Disciplina:</strong> <?php echo e($material->disciplina()->first()->name); ?></div>
									<div class="col-md-4"><strong>Link:</strong> <a href="<?php echo e($material->link); ?>" target="blank"> <?php echo e($material->link); ?></a></div>
									<div class="col-md-2">
										<a href="javascript:del(<?php echo e($material->id); ?>)" class="btn btn-danger text-white"><i class="fas fa-times-circle icone"></i> Apagar</a>
									</div>
								</div>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<h4 class="text-center mt-2">Não há materiais cadastrados</h4>
						<?php endif; ?>
					</ul>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-md-6 offset-md-4">
							<a href="<?php echo e(route('professor.home')); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
							<a href="<?php echo e(route('professor.cadMaterial')); ?>" class="btn btn-primary text-white"> <i class="fa fa-plus"></i> Cadastrar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function del(cod){
		if(confirm('Deseja excluir esse material')){
			location.href='../professor/deletar_material/'+cod;
		}
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('professor.layout.professor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>