<?php $__env->startSection('content'); ?>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<form action="<?php echo e(route('aluno.novaSolicitacao')); ?>" method="POST">
					<?php echo csrf_field(); ?>

					<card cor="bg-nav" titulo="Nova solicitacao" submit="Solicitar" voltar="<?php echo e(route('aluno.home')); ?>">
						
						<div class="form-group row">
							<label for="tipo" class="col-md-4 col-form-label text-md-right">O que solicitar</label>
							<div class="col-md-6">
								<select name="tipo" id="tipo" class="form-control">
									<option >Escolha uma opção</option>
									<option value="Historico">Historico</option>
									<option value="Declaração">Declaração</option>
									<option value="Outras">Outras</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="" class="col-md-4 col-form-label text-md-right">Mensagem</label>
							<div class="col-md-6">
								<textarea name="mensagem" id="mensagem" cols="30" rows="10" class="form-control"></textarea>
							</div>
						</div>
					</card>
				</form>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('aluno.layout.aluno', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>