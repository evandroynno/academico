<?php $__env->startSection('guest_menu'); ?>
<li class="nav-item">
	<a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
</li>
<li class="nav-item">
	<a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
</li>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('matricula'); ?>
	<?php if(isset(Auth::user()->matricula)): ?>
		<?php echo e(Auth::user()->matricula); ?> -
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
	<a href="<?php echo e(route('aluno.alterSenha')); ?>" class="dropdown-item">Alterar Senha</a>
	<a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();">
	<?php echo e(__('Logout')); ?>

	</a>

	<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
		<?php echo csrf_field(); ?>
	</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>