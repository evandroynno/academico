<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
		<div class="row alert alert-info" role="alert">
			<strong><?php echo e(session('status')); ?></strong>
		</div>
	<?php endif; ?>

	<?php if(session('error')): ?>
		<div class="row alert alert-danger" role="alert">
			<strong><?php echo e(session('error')); ?></strong>
		</div>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card bg-nav text-white">
				<form method="POST" action="<?php echo e(route('admin.cadAlunoOk')); ?>" aria-label="Cadastrar Aluno">
					<?php echo csrf_field(); ?>
					<div class="card-header">Cadastrar Aluno</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>
							<div class="col-md-6">
								<input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" placeholder="Ex.: João Silva" required autofocus>
								<?php if($errors->has('name')): ?>
									<span class="invalid-feedback" role="alert">
										<strong><?php echo e($errors->first('name')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>
							<div class="col-md-6">
								<input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Ex.: usuario@provedor.com" required autofocus>
								<?php if($errors->has('email')): ?>
									<span class="invalid-feedback" role="alert">
										<strong><?php echo e($errors->first('email')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="dt_nasc" class="col-md-4 col-form-label text-md-right">Data de Nascimento</label>
							<div class="col-md-6">
								<input type="date" name="dt_nasc" id="dt_nasc" min="1918-01-01" class="form-control" value="<?php echo e(old('dt_nasc')); ?>" autofocus>
							</div>
						</div>
						<div class="form-group row">
							<label for="uf" class="col-md-4 col-form-label text-md-right">UF</label>
							<div class="col-md-6">
								<select name="uf" id="uf" class="form-control" autofocus>
									<option value="">Escolha um Estado</option>
									<?php $__currentLoopData = $ufs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($uf->id); ?>" <?php echo e(old('uf')==$uf->id?'selected':''); ?> ><?php echo e($uf->name); ?> - <?php echo e($uf->abbr); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="cidade" class="col-md-4 col-form-label text-md-right">Cidade</label>
							<div class="col-md-6">
								<?php
									if(old('uf')){
										$uf = old('uf');
										echo '<script>window.onload = function(){getCidades('.$uf.')}</script>';
									}
								?>
								<select name="cidade" id="cidade" class="form-control" disabled>
									<option>Escolha um estado primeiro</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="sexo" class="col-md-4 col-form-label text-md-right">Genero</label>
							<div class="col-md-6">
								<label class='col-5' for="sexo-m"><input id="sexo-m" type="radio" class="form-check-input" name="sexo" value="m" <?php echo e(old('sexo')=='m'?'checked':''); ?>>Masculino</label>
								<label class='col-5' for="sexo-f"><input id="sexo-f" type="radio" class="form-check-input" name="sexo" value="f" <?php echo e(old('sexo')=='m'?'checked':''); ?>>Feminino</label>
							</div>
						</div>
						<div class="form-group row">
							<label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>
							<div class="col-md-6">
								<input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo e(old('telefone')); ?>" placeholder="Ex.: (00) 0000-0000">
							</div>
						</div>
						

						<div class="form-group row">
							<label for="perfil" class="col-md-4 col-form-label text-md-right">Perfil</label>
							<div class="col-md-6">
								<select name="perfil" id="perfil" class="form-control">
									<option value="">Escolha</option>
									<option value="leigo" <?php echo e(old('perfil')=='leigo'? 'selected':''); ?>>Leigo</option>
									<option value="religioso" <?php echo e(old('perfil')=='religioso'? 'selected':''); ?>>Religioso</option>
									<option value="sacerdote" <?php echo e(old('perfil')=='sacerdote'? 'selected':''); ?>>Sacerdote</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="local" class="col-md-4 col-form-label text-md-right">Local do Curso</label>
							<div class="col-md-6">
								<select name="local" id="local" class="form-control">
									<option value="">Escolha o local</option>
									<option value="rio" <?php echo e(old('local')=='rio'? 'selected':''); ?>>Rio de Janeiro - RJ</option>
                                    <option value="londrina" <?php echo e(old('local')=='londrina'? 'selected':''); ?>>Londrina - PR</option>
                                    <option value="goiania" <?php echo e(old('local')=='goiania'? 'selected':''); ?>>Goiania - GO</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>
							<div class="col-md-6">
								<input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required autofocus>
								<?php if($errors->has('password')): ?>
									<span class="invalid-feedback" role="alert">
										<strong><?php echo e($errors->first('password')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirm Password')); ?></label>
							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="form-group row mb-0">
							<div class="col-md-4 offset-md-8">
								<a href="<?php echo e(route('admin.home')); ?>" class="btn btn-primary text-white">Voltar</a>
								<button type="submit" class="btn btn-primary">
									Cadastrar
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>