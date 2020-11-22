<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(session('status')): ?>
        <div class="row alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
		<?php if(Auth::user()->grades->toArray()): ?>
        <div class="col-md-4 mb-2">
            <div class="card bg-nav">
                <div class="card-header"><i class="fas fa-book"></i> Matérias</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href='<?php echo e(route('aluno.disciplinas')); ?>'>Disciplinas do curso</a></li>
                        <li class="list-group-item"><a href='<?php echo e(route('aluno.material')); ?>'>Material On-line</a></li>
                        
                    </ul>
                </div>
			</div>
        </div>
		<?php endif; ?>
        <div class="col-md-4 mb-2">
			<div class="card bg-nav text-white">
				<div class="card-header"><i class="fas fa-laptop"></i> Consultas Acadêmicas</div>

				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href='<?php echo e(route('aluno.notas')); ?>'>Notas do Curso</a></li>
						
						<li class="list-group-item"><a href='<?php echo e(route('aluno.consultarPagamento')); ?>'>Consultar Pagamentos</a></li> 
						<li class="list-group-item"><a href='<?php echo e(route('aluno.solicitacoes')); ?>'>Solicitações 
                            <?php if(Auth::user()->solicitacaosRespondidas->count()>0): ?>
                                <span class="badge badge-primary"><?php echo e(Auth::user()->solicitacaosRespondidas->count()); ?></span>
                            <?php endif; ?>
                        </a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-2">
            <div class="card bg-nav">
                <div class="card-header"><i class="fas fa-info"></i> Informações</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="<?php echo e(route('aluno.editarDados')); ?>">Dados Cadastrais</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('aluno.editarDados')); ?>">Alterar senha</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('aluno.layout.aluno', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>