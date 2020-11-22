<?php $__env->startSection('guest_menu'); ?>
	<li class="nav-item">
		<a class="nav-link" href="<?php echo e(route('admin.login')); ?>"><?php echo e(__('Login')); ?></a>
	</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('menu'); ?>
	<a href="<?php echo e(route('admin.alterSenha')); ?>" class="dropdown-item">Alterar Senha</a>
	<a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();">
	<?php echo e(__('Logout')); ?>

	</a>

	<form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
		<?php echo csrf_field(); ?>
	</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>