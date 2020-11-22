<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
	<div class="row alert alert-success" role="alert">
		<?php echo e(session('status')); ?>

	</div>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="card bg-nav">
				<div class="card-header">Histórico</div>
				<div class="card-body">
					<div class="row justify-content-center">
						<div><h3>Curso de Mestrado em Direito Canônico</h3></div>
					</div>
					<div class="row justify-content-center">
						<div><h3>Histórico</h3></div>
					</div>
					<div class="row">
						<div class="col-6">Nome: <?php echo e($aluno->name); ?></div>
						<div class="col-6">Matricula: <?php echo e($aluno->matricula); ?></div>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Disciplina</th>
									<th>CR</th>
									<th>Nota</th>
									<th>COF/CRD</th>
								</tr>
								<tbody>
									<?php $__currentLoopData = $disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disciplina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($disciplina->cod); ?></td>
										<td><?php echo e($disciplina->name); ?></td>
										<td><?php echo e($disciplina->creditos); ?></td>
										<td><?php echo e(isset($aluno->notas->where('disciplina_id',$disciplina->id)->first()->notaFinal)? $aluno->notas->where('disciplina_id',$disciplina->id)->first()->notaFinal:''); ?></td>
										<td><?php echo e(isset($aluno->notas->where('disciplina_id',$disciplina->id)->first()->status)? $aluno->notas->where('disciplina_id',$disciplina->id)->first()->status:'Não Cursado'); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</thead>
						</table>
					</div>
				</div>
				<div class="card-footer">
					<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					<a href="<?php echo e(url("admin/lista_de_alunos/gerarHistoricoPDF/$aluno->id")); ?>" class="btn btn-primary text-white"><i class="fas fa-download"></i> Salvar em PDF</a>
				</div>
			</div>
		</div>
	</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>