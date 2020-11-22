<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
        <div class="row alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card bg-nav">
                <div class="card-header"><i class="fas fa-book"></i> Disciplina</div>
                <div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="<?php echo e(route('professor.listMaterial')); ?>">Material on-line</a></li>
						<li class="list-group-item"><a href="<?php echo e(route('professor.selecionarData')); ?>">Lista de Presença</a></li>
						<li class="list-group-item"><a href="<?php echo e(route('professor.selecionarDisciplina')); ?>">Lançar Notas</a></li>
					</ul>
                </div>
            </div>
		</div>
		<div class="col-md-4">
			<div class="card bg-nav text-white">
				<div class="card-header"><i class="fas fa-info"></i> Informações</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="<?php echo e(route('professor.editarDados')); ?>">Dados Cadastrais</a></li>
						<li class="list-group-item"><a href="<?php echo e(route('professor.alterSenha')); ?>">Alterar senha</a></li>
					</ul>
				</div>
			</div>
		</div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('professor.layout.professor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>