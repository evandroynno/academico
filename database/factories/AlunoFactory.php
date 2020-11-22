<?php

use Keygen\Keygen;
use Faker\Generator as Faker;

$factory->define(App\Aluno::class, function (Faker $faker) {

	$aluno = [
		'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
		'remember_token' => str_random(10),
		'dt_nasc' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'sexo' => $faker->randomElement($array= array('m','f')),
		'uf' => $faker->stateAbbr,
		'cidade' => $faker->city,
		'perfil' => $faker->randomElement($array= array('leigo','religioso','sacerdote')),
		'telefone' => $faker->cellphoneNumber,
		'local' => $faker->randomElement($array=array('rio','londrina','goiania')),
	];
	if ($aluno['local'] == 'rio') {
		$aluno['matricula'] = date('Y').(date('n') < 6?'01':'02').'1'. Keygen::numeric(3)->generate();
	} elseif ($aluno['local'] == 'londrina') {
		$aluno['matricula'] = $aluno['matricula'] = date('Y').(date('n') < 6?'01':'02').'2'. Keygen::numeric(3)->generate();;
	} else {
		$aluno['matricula'] = $aluno['matricula'] = date('Y').(date('n') < 6?'01':'02').'3'. Keygen::numeric(3)->generate();;
	}

	return $aluno;
});
