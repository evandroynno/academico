<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
		<status msg="<?php echo e(session('status')); ?>"></status>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-md-10">
			
			<card titulo="Lista de Alunos há confirmar" i='fas fa-user' cor="bg-nav" voltar="<?php echo e(route('admin.home')); ?>">
				<tabela-lista
					v-bind:titulos="['Nome','Matricula','Email']"
					v-bind:itens="<?php echo e(json_encode($alunos->toArray())); ?>"
					editar="listar_pendenteOk/"
				>

				</tabela-lista>
			</card>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>