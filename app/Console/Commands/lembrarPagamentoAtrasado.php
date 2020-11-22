<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Aluno;

class lembrarPagamentoAtrasado extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:lembrarPagamento';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lembra Alunos em atraso';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		$alunosVerificados = Aluno::where('verified',true)->get();

		echo $alunosVerificados;
    }
}
