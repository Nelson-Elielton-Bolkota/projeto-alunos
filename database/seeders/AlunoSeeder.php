<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = [
            'Análise e Desenvolvimento de Sistemas', 
            'Engenharia de Software', 
            'Ciência da Computação', 
            'Sistemas de Informação'
        ];

        // Loop para gerar exatamente 10 alunos de teste [1]
        for ($i = 1; $i <= 10; $i++) {
            Aluno::create([
                'nome' => "Aluno Acadêmico " . $i,
                'curso' => $cursos[array_rand($cursos)],
            ]);
        }
    }
}