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
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cadastro', Auth::user())): ?>
		<div class="col-md-4 my-3">
			<card titulo="Administrativo" i="fas fa-cogs" cor="bg-nav">
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><strong>Cadastros</strong>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href="<?php echo e(route('admin.cadAluno')); ?>">Cadastrar Aluno</a>
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><a href="<?php echo e(route('admin.listarpendente')); ?>">Alunos a confirmar</a></li>
							</ul>
							</li>
							<li class="list-group-item"><a href="<?php echo e(route('admin.cadProf')); ?>">Cadastrar Professor</a></li>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('adm', Auth::user())): ?>
							<li class="list-group-item"><a href="<?php echo e(route('admin.cadFunc')); ?>">Cadastrar Funcionário</a></li>
							<?php endif; ?>
						</ul>
					</li>
					<li class="list-group-item"><a href="<?php echo e(route('admin.listarProfessores')); ?>">Lista de Professores</a></li>
					<li class="list-group-item"><a href="<?php echo e(route('admin.listaAluno')); ?>">Lista de Alunos</a></li>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('adm', Auth::user())): ?>
					<li class="list-group-item"><a href="<?php echo e(route('admin.listaFunc')); ?>">Lista de Funcionario</a></li>
					<?php endif; ?>
				</ul>
			</card>
    	</div>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('academico', Auth::user())): ?>
		<div class="col-md-4 my-3">
			<card titulo="Acadêmico" i="fas fa-book" cor="bg-nav">
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><a href="<?php echo e(route('admin.listarDisciplinas')); ?>"><strong>Listar Disciplinas</strong></a></li>
					<li class="list-group-item"><a href="<?php echo e(route('admin.listarMaterial')); ?>"><strong>Material on-line</strong></a></li>

					<li class="list-group-item"><strong>Professor</strong>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href="<?php echo e(route('admin.selecionarMateria')); ?>">Lançar Notas</a></li>
							
						</ul>
					</li>
					<li class="list-group-item"><a href="<?php echo e(route('admin.criarTurma')); ?>">Criar de Turmas</a></li>
					<li class="list-group-item"><a href="<?php echo e(route('admin.listarTurma')); ?>">Listar de Turmas</a></li>

					<li class="list-group-item"><a href="<?php echo e(route('admin.solicitacoes')); ?>">Solicitações Pendentes
						<?php if($solicitacoes->count() > 0): ?>
							<span class="badge badge-primary"><?php echo e($solicitacoes->count()); ?></span>
						<?php endif; ?>
					</a></li>
				</ul>
			</card>
		</div>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('finance', Auth::user())): ?>
		<div class="col-md-4 my-3">
			<card titulo="Financeiro" i="fas fa-dollar-sign" cor="bg-nav">
				<ul class="list-group list-group-flush">
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('geral', Auth::user())): ?>
					<li class="list-group-item"><strong>Mensalidades</strong>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href='<?php echo e(route('admin.listaParaPagamentos')); ?>'>Registrar Pagamento</a></li>
						</ul>
					</li>
					<li class="list-group-item"><strong>Controle Financeiro</strong>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href='<?php echo e(route('admin.historicoMovimentos')); ?>'>Transações</a></li>
						</ul>
					</li>
					<?php endif; ?>
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('relatoriosFinan', Auth::user())): ?>
					<li class="list-group-item"><strong>Relatórios</strong>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href='<?php echo e(route('admin.relatorioDeMensalidades')); ?>'>Gerar Relatorio de Mensalidades</a></li>
							<li class="list-group-item"><a href='<?php echo e(route('admin.escolhaMes')); ?>'>Gerar Relatorio de Movimentações</a></li>
							
						</ul>
					</li>
					<?php endif; ?>
				</ul>
			</card>
		</div>
		<?php endif; ?>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/jquery.maskMoney.js')); ?>"></script>
<script>
	$("#valor").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});

	$("[name=tipo]").change(function(){
		var tipo = $(this).val();
		if(tipo == 'E'){
			$('#addon1').text('+');
		}else{
			$('#addon1').text('-')
		}

	})
	console.log($("[name=tipo]").val())
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>