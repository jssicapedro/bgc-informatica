<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            DB::table('servicos')->insert([
                // Serviços para Smartphones
                [
                    'id' => 1,
                    'categoria_id' => 2, // Smartphones
                    'NomeServico' => 'limpeza',
                    'custo' => 20.00,
                    'descricao' => 'Serviço de limpeza completo para smartphones.',
                ],
                [
                    'id' => 2,
                    'categoria_id' => 2, // Smartphones
                    'NomeServico' => 'conserto',
                    'custo' => 25.00,
                    'descricao' => 'Reparo de problemas comuns em smartphones.',
                ],
                [
                    'id' => 3,
                    'categoria_id' => 2, // Smartphones
                    'NomeServico' => 'substituição/manutenção',
                    'custo' => 17.00,
                    'descricao' => 'Troca de componentes danificados em smartphones.',
                ],

                // Serviços para Computadores
                [
                    'id' => 4,
                    'categoria_id' => 1, // Computadores
                    'NomeServico' => 'limpeza',
                    'custo' => 10.00,
                    'descricao' => 'Serviço de limpeza interna e externa de computadores.',
                ],
                [
                    'id' => 5,
                    'categoria_id' => 1, // Computadores
                    'NomeServico' => 'conserto',
                    'custo' => 18.00,
                    'descricao' => 'Reparo de hardware e software em computadores.',
                ],
                [
                    'id' => 6,
                    'categoria_id' => 1, // Computadores
                    'NomeServico' => 'substituição/manutenção',
                    'custo' => 12.00,
                    'descricao' => 'Troca de componentes defeituosos em computadores.',
                ],

                // Serviços para Outros Equipamentos
                [
                    'id' => 7,
                    'categoria_id' => 3, // Outros equipamentos
                    'NomeServico' => 'limpeza',
                    'custo' => 5.00,
                    'descricao' => 'Serviço de limpeza de vários tipos de equipamentos.',
                ],
                [
                    'id' => 8,
                    'categoria_id' => 3, // Outros equipamentos
                    'NomeServico' => 'substituição/manutenção',
                    'custo' => 10.00,
                    'descricao' => 'Reparo de diversos equipamentos eletrônicos.',
                ],
                [
                    'id' => 9,
                    'categoria_id' => 3, // Outros equipamentos
                    'NomeServico' => 'substituição/manutenção',
                    'custo' => 14.00,
                    'descricao' => 'Troca de peças em vários tipos de equipamentos.',
                ]
            ]);
        }
    }
}

