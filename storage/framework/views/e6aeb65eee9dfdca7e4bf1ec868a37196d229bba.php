<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo e(config('app.name', 'Laravel')); ?></title>

	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<!-- Styles -->
	
	
	
	<style type="text/css" >
		*{
			box-sizing: border-box;
		}
		.text-nowrap {
			white-space: nowrap !important;
		}
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
		}
		table {
			width: 100%;
			display: table;
		}
		/* td{
			border: 1px solid darkgrey;
		} */
		tr {
			display: table-row;
			line-height: 20px;
		}
		.highlight {
			background-color: brown;
			color: #fff;
			display: table-cell;
		}
		.sym{
			align-items: center;
			display: table-cell;
			width: 35px;
		}
		.sym i{
			/* margin: 4px; */
			padding-left: 10px;
			padding-top: 3px;
			/* padding-bottom: 2px; */
		}
		.text-green{
			background: greenyellow;
			color: #000;
		}
		.text-red{
			background: crimson;
			color: #000;
		}
		div{
			display: block;
		}
		.col-left{
			margin-bottom: 15px;
		}
		.col-right{
			float: right
		}
		.row{
			display: inline-table;
		}

	</style>
</head>
<body>
	<div class="row justify-content-center">
		<div class="col-left">
			
			<img src="<?php echo e(public_path('img/logo.png')); ?>">
		</div>
		<div class="col-right">
			<h2>Relatorio de pagamentos <?php echo e($turma->semestre); ?></h2>
		</div>
	</div>
	<table class="table table-striped table-bordered text-nowrap">
		<thead>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Valor Mensal</th>
				<th scope="col">Val. Semestre</th>
				<?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<th scope="col"><?php echo e(mes($mes)); ?></th>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<th scope="col">Recebido</th>
				<th scope="col">Subtotal</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $alunos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aluno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($aluno->gradesAtual != null && $aluno->gradesAtual->creditos != 0): ?>
			<tr class="px-2">
				<?php
					$i=0
				?>
				<td class="px-2"><?php echo e($aluno->name); ?></td>
				<td>
					<?php if($aluno->bolsa != null): ?>
						<?php echo e(valorBolsista($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])); ?>

					<?php else: ?>
						<?php echo e(valorMensal($aluno->gradesAtual->creditos)); ?>

					<?php endif; ?>
				</td>
				<td>
					<?php if($aluno->bolsa != null): ?>
						R$ <?php echo e((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*6); ?>,00
					<?php else: ?>
						R$ <?php echo e((int)valorMensalDB($aluno->gradesAtual->creditos)*6); ?>,00
					<?php endif; ?>
				</td>
				<?php $__currentLoopData = $aluno->mensalidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensalidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($aluno->bolsa != null && $aluno->bolsa['percentual'] == '100'): ?>
					<td class="sym highlight">Isento</td>
				<?php elseif($mensalidade->pago): ?>
					<td class="sym text-green"><i class="far fa-check-circle"></i></td>
				<?php else: ?>
					<td class="sym <?php echo e(\Carbon\Carbon::parse($mensalidade->data_venv) < \Carbon\Carbon::now() && $mensalidade->pago == false ?'bg-danger text-red':''); ?>"><i class="far fa-times-circle"></i></td>
				<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<td>
					
					<?php $__currentLoopData = $aluno->mensalidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensalidade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($mensalidade->pago): ?>
						<?php
							$i++;
						?>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php if($aluno->bolsa != null): ?>
						R$<?php echo e((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*$i); ?>,00
					<?php else: ?>
						R$<?php echo e((int)valorMensalDB($aluno->gradesAtual->creditos)*$i); ?>,00
					<?php endif; ?>
				</td>
				<td>
					<?php if($aluno->bolsa != null): ?>
						R$<?php echo e(((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*6)-((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*$i)); ?>,00
					<?php else: ?>
						R$<?php echo e(((int)valorMensalDB($aluno->gradesAtual->creditos)*6)-((int)valorMensalDB($aluno->gradesAtual->creditos)*$i)); ?>,00
					<?php endif; ?>
				</td>
			</tr>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html>
