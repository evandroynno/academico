<?php

use Illuminate\Database\Seeder;

class DisciplinaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$now = date("Y-m-d H:i:s");

		DB::table('disciplinas')->insert([
			[
				"cod"			=> "JUR 101",
				"name"			=> "Normas Gerais I",
				"creditos"		=> 03,
				"semestre"		=> "A",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 102",
				"name"			=> "Normas Gerais  II",
				"creditos"		=> 03,
				"semestre"		=> "A",
				"requisito_cod"	=> "JUR 101",
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 102B",
				"name"			=> "Normas Gerais II Prática",
				"creditos"		=> 01,
				"semestre"		=> "A",
				"requisito_cod"	=> "JUR 101",
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 103",
				"name"			=> "Povo de Deus I",
				"creditos"		=> 02,
				"semestre"		=> "A",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 104",
				"name"			=> "Povo de Deus II",
				"creditos"		=> 02,
				"semestre"		=> "A",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 108",
				"name"			=> "Povo de Deus  IV",
				"creditos"		=> 02,
				"semestre"		=> "A",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 111",
				"name"			=> "Missão de Santificar  I",
				"creditos"		=> 02,
				"semestre"		=> "A",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 112",
				"name"			=> "Missão de Santificar  II",
				"creditos"		=> 02,
				"semestre"		=> "A",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 203",
				"name"			=> "Filosofia do Direito",
				"creditos"		=> 02,
				"semestre"		=> "A",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 204",
				"name"			=> "Introdução ao Direito Canônico",
				"creditos"		=> 02,
				"semestre"		=> "A",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 210",
				"name"			=> "História das Fontes",
				"creditos"		=> 02,
				"semestre"		=> "A",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 211",
				"name"			=> "História das Instituições",
				"creditos"		=> 02,
				"semestre"		=> "A",
				"requisito_cod"	=> "JUR 210",
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],

			[
				"cod"			=> "JUR 113",
				"name"			=> "Missão de Santificar  III",
				"creditos"		=> 02,
				"semestre"		=> "B",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 114",
				"name"			=> "Missão de Santificar  IV.A",
				"creditos"		=> 02,
				"semestre"		=> "B",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 114B",
				"name"			=> "Missão de Santificar  IV.B",
				"creditos"		=> 02,
				"semestre"		=> "B",
				"requisito_cod"	=> "JUR 114",
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 116",
				"name"			=> "Bens Temporais",
				"creditos"		=> 02,
				"semestre"		=> "B",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 110",
				"name"			=> "Missão de Ensinar",
				"creditos"		=> 02,
				"semestre"		=> "B",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 206",
				"name"			=> "Teologia do Direito",
				"creditos"		=> 02,
				"semestre"		=> "B",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 207",
				"name"			=> "Direito Romano",
				"creditos"		=> 02,
				"semestre"		=> "B",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 208",
				"name"			=> "Direito Público Eclesiástico",
				"creditos"		=> 02,
				"semestre"		=> "B",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 212",
				"name"			=> "Direito Oriental",
				"creditos"		=> 02,
				"semestre"		=> "B",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 209",
				"name"			=> "Direito Civil",
				"creditos"		=> 02,
				"semestre"		=> "B",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 109",
				"name"			=> "Povo de Deus  V A",
				"creditos"		=> 02,
				"semestre"		=> "C",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 109B",
				"name"			=> "Povo de Deus  V B",
				"creditos"		=> 02,
				"semestre"		=> "C",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 115",
				"name"			=> "Missão de Santificar  V",
				"creditos"		=> 02,
				"semestre"		=> "C",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 117",
				"name"			=> "Sanções",
				"creditos"		=> 03,
				"semestre"		=> "C",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 118",
				"name"			=> "Direito Processual  I",
				"creditos"		=> 04,
				"semestre"		=> "C",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 118B",
				"name"			=> "Direito Processual  II",
				"creditos"		=> 04,
				"semestre"		=> "C",
				"requisito_cod"	=> "JUR 118",
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "JUR 205",
				"name"			=> "Metodologia da Dissertação",
				"creditos"		=> 01,
				"semestre"		=> "C",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "LL1",
				"name"			=> "Língua Latina I",
				"creditos"		=> 02,
				"semestre"		=> "E",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "LL2",
				"name"			=> "Língua Latina II",
				"creditos"		=> 02,
				"semestre"		=> "E",
				"requisito_cod"	=> "LL1",
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "LL3",
				"name"			=> "Língua Latina III",
				"creditos"		=> 04,
				"semestre"		=> "E",
				"requisito_cod"	=> "LL1",
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "LL4",
				"name"			=> "Língua Latina IV",
				"creditos"		=> 04,
				"semestre"		=> "E",
				"requisito_cod"	=> "LL3",
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "LI1",
				"name"			=> "Língua Italiana I",
				"creditos"		=> 02,
				"semestre"		=> "E",
				"requisito_cod"	=> null,
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			],
			[
				"cod"			=> "LI2",
				"name"			=> "Língua Italiana II",
				"creditos"		=> 02,
				"semestre"		=> "E",
				"requisito_cod"	=> "LI1",
				"created_at" 	=> $now,
                "updated_at" 	=> $now,
			]
		]);
    }
}
