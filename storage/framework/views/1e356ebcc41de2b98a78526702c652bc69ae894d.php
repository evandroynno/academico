<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

	<title><?php echo e(config('app.name', 'Laravel')); ?></title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	
	

	<!-- Styles -->
	<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('css/select2.min.css')); ?>" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	
</head>
<body>
	<div id="app">
		<div class="container-fluid my-3">
			<div class="row">
				<div class="col-12 col-md-8"><img src="<?php echo e(asset('img/logo.png')); ?>"></div>
			</div>
		</div>
		<nav class="navbar navbar-expand-md navbar-dark bg-nav navbar-laravel">
			<div class="container">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav mr-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Authentication Links -->
						<?php if(auth()->guard()->guest()): ?>
							<?php echo $__env->yieldContent('guest_menu'); ?>
						<?php else: ?>
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									<?php echo $__env->yieldContent('matricula'); ?><?php echo e(Auth::user()->name); ?> <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<?php echo $__env->yieldContent('menu'); ?>
								</div>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</nav>
		<?php ($url='/'); ?>
		<ul class="breadcrumb bg-transparent">
			<li class="breadcrumb-item"><a href="<?php echo e(url($url)); ?>">Inicio</a></li>
			<?php $__currentLoopData = Request::segments(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php ($url .= $item.'/'); ?>
				<?php if($loop->last): ?>
					<li class="breadcrumb-item text-capitalize active">
						<?php echo e(str_replace('_',' ',$item)); ?>

					</li>
				<?php else: ?>
					<li class="breadcrumb-item text-capitalize">
						<a href="<?php echo e(url($url)); ?>"><?php echo e(str_replace('_',' ',$item)); ?></a>
					</li>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>

		<main class="py-4">
			<?php echo $__env->yieldContent('content'); ?>
		</main>
		<div class="rdp"></div>
		<footer class="bg-nav text-center py-2">
			©<?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. <?php echo app('translator')->getFromJson('Todos direitos resevados'); ?> - Criado por Evandro Magalhães
		</footer>

	</div>
	<!-- Scripts -->
	<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
	<script src="<?php echo e(asset('js/sistema.js')); ?>" defer></script>
	<script src="<?php echo e(asset('js/vendor/jquery.hideseek.js')); ?>" defer></script>
	<script src="<?php echo e(asset('js/select2.js')); ?>" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js" defer></script>
	<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
