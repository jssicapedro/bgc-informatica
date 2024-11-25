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
                    'nome' => 'limpeza',
                    'custo' => 20.00,
                    'estimativa' => 30,
                    'descricao' => 'Serviço de limpeza completo para smartphones.',
                ],
                [
                    'id' => 2,
                    'categoria_id' => 2, // Smartphones
                    'nome' => 'conserto',
                    'custo' => 25.00,
                    'estimativa' => 120,
                    'descricao' => 'Reparo de problemas comuns em smartphones.',
                ],
                [
                    'id' => 3,
                    'categoria_id' => 2, // Smartphones
                    'nome' => 'substituição/manutenção',
                    'custo' => 17.00,
                    'estimativa' => 120,
                    'descricao' => 'Troca de componentes danificados em smartphones.',
                ],
                // Serviços para Computadores
                [
                    'id' => 4,
                    'categoria_id' => 1, // Computadores
                    'nome' => 'limpeza',
                    'custo' => 10.00,
                    'estimativa' => 60,
                    'descricao' => 'Serviço de limpeza interna e externa de computadores.',
                ],
                [
                    'id' => 5,
                    'categoria_id' => 1, // Computadores
                    'nome' => 'conserto',
                    'custo' => 18.00,
                    'estimativa' => 120,
                    'descricao' => 'Reparo de hardware e software em computadores.',
                ],
                [
                    'id' => 6,
                    'categoria_id' => 1, // Computadores
                    'nome' => 'substituição/manutenção',
                    'custo' => 12.00,
                    'estimativa' => 180,
                    'descricao' => 'Troca de componentes defeituosos em computadores.',
                ],

                // Serviços para Outros Equipamentos
                [
                    'id' => 7,
                    'categoria_id' => 3, // Outros equipamentos
                    'nome' => 'limpeza',
                    'custo' => 5.00,
                    'estimativa' => 60,
                    'descricao' => 'Serviço de limpeza de vários tipos de equipamentos.',
                ],
                [
                    'id' => 8,
                    'categoria_id' => 3, // Outros equipamentos
                    'nome' => 'substituição/manutenção',
                    'custo' => 10.00,
                    'estimativa' => 240,
                    'descricao' => 'Reparo de diversos equipamentos eletrônicos.',
                ],
                [
                    'id' => 9,
                    'categoria_id' => 3, // Outros equipamentos
                    'nome' => 'substituição/manutenção',
                    'custo' => 14.00,
                    'estimativa' => 160,
                    'descricao' => 'Troca de peças em vários tipos de equipamentos.',
                ]
            ]);

            DB::table('rma_servico')->insert([[
                'rma_id' => 1,
                'servico_id' => 5,
                'tecnico_id' => 1,
            ],
            [
                'rma_id' => 1,
                'servico_id' => 4,
                'tecnico_id' => 3,
            ],
            [
                'rma_id' => 2,
                'servico_id' => 4,
                'tecnico_id' => 3,
            ],
            [
                'rma_id' => 3,
                'servico_id' => 2,
                'tecnico_id' => 4,
            ]
            ]);
        }
    }
}

