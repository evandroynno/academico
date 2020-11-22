<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
	<div class="row alert alert-info alert-dismissible fade show" role="alert">
		<strong><?php echo e(session('status')); ?></strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card bg-nav text-white w-100">
				<form action="<?php echo e(url('/admin/cadastrar_Funcionario')); ?>" method="post" aria-label="Cadastrar Funcionario">
					<?php echo csrf_field(); ?>
					<div class="card-header">Cadastrar Funcionário</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">Nome Completo</label>
							<div class="col-md-6">
								<input name='name' id="name" type="text" class="form-control<?php echo e($errors->has('name')?' is-invalid':''); ?>" value="<?php echo e(old('name')); ?>" required autofocus placeholder="Ex.: João Silva">
								<?php if($errors->has('name')): ?>
									<span class="invalid-feedback" role="alert">
										<strong><?php echo e($errors->first('name')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
							<div class="col-md-6">
								<input name='email' id="email" type="text" placeholder="Ex.: usuario@provedor.com" class="form-control<?php echo e($errors->has('email')?' is-invalid':''); ?>" value="<?php echo e(old('email')); ?>" required autofocus>
								<?php if($errors->has('email')): ?>
									<span class="invalid-feedback" role="alert">
										<strong><?php echo e($errors->has('email')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="telefone" class="col-md-4 col-form-label text-md-right">Telefone</label>
							<div class="col-md-6">
								<input class="form-control<?php echo e($errors->has('telefone')?' is-invalid':''); ?>" type="text" name="telefone" id="telefone" placeholder="(00) 90000-0000" value="<?php echo e(old('telefone')); ?>" required autofocus>
								<?php if($errors->has('telefone')): ?>
									<span class="invalid-feedback" role="alert">
										<strong><?php echo e($errors->has('telefone')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="setor" class="col-md-4 col-form-label text-md-right">Setor</label>
							<div class="col-md-6">
								<select name="setor" id="setor" class="form-control">
									<option value="">Escolha um setor</option>
									<option value="direcao" <?php echo e(old('setor')=='direcao'?'selected':''); ?> >Direção</option>
									<option value="secgeral" <?php echo e(old('setor')=='direcao'?'secgeral':''); ?>>Secretaria Geral</option>
									<option value="coordenacao" <?php echo e(old('setor')=='direcao'?'coordenacao':''); ?>>Coordenação</option>
									<option value="secretaria" <?php echo e(old('setor')=='direcao'?'secretaria':''); ?>>Secretaria</option>
									<option value="administração" <?php echo e(old('setor')=='direcao'?'administração':''); ?>>Administração</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo de acesso</label>
							<div class="col-md-6">
								<select name="tipo" id="tipo" class="form-control">
									<option value="">Escolha o tipo de acesso</option>
									<option value="diretor" <?php echo e(old('tipo')=='diretor'?'selected':''); ?>>Diretor</option>
									<option value="gerencial" <?php echo e(old('tipo')=='gerencial'?'selected':''); ?>>Gerencial</option>
									<option value="supervisao" <?php echo e(old('tipo')=='supervisao'?'selected':''); ?>>Supervisão</option>
									<option value="academico" <?php echo e(old('tipo')=='academico'?'selected':''); ?>>Acadêmico</option>
									<option value="administrativo" <?php echo e(old('tipo')=='administrativo'?'selected':''); ?>>Administrativo</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="dt_nasc" class="col-md-4 col-form-label text-md-right">Data de Nascimento</label>
							<div class="col-md-6">
								<input type="date" name="dt_nasc" value="<?php echo e(old('dt_nasc')); ?>" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Senha</label>
							<div class="col-md-6">
								<input name='password' type="password" class="form-control<?php echo e($errors->has('password')?' is-invalid':''); ?>" placeholder="Insira a senha">
								<?php if($errors->has('password')): ?>
									<span class="invalid-feedback" role="alert">
										<strong><?php echo e($errors->has('password')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-4 col-form-label text-md-right">Confirme Nova Senha</label>
							<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirme Nova Senha">
							</div>
						</div>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master', Auth::user())): ?>
							<div class="form-group row">
								<label for="local" class="col-md-4 col-form-label text-md-right">Local</label>
								<div class="col-md-6">
									<select name="local" id="local" class="form-control">
										<option value="rio" selected>Rio</option>
										<option value="goiania">Goiania</option>
										<option value="londrina">Londrina</option>
									</select>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="card-footer">
						<div class="form-group row mb-0">
							<div class="col-md-3 offset-md-9">
								<a href="<?php echo e(route('admin.home')); ?>" class="btn btn-primary text-white">Voltar</a>
								<button type="submit" class="btn btn-primary">
									Salvar
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