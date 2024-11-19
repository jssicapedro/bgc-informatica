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
                    'categoria' => 2, // Smartphones
                    'serviceNome' => 'Limpeza de smartphones',
                    'custo' => 20.00,
                    'description' => 'Serviço de limpeza completo para smartphones.',
                ],
                [
                    'id' => 2,
                    'categoria' => 2, // Smartphones
                    'serviceNome' => 'Conserto de smartphones',
                    'custo' => 25.00,
                    'description' => 'Reparo de problemas comuns em smartphones.',
                ],
                [
                    'id' => 3,
                    'categoria' => 2, // Smartphones
                    'serviceNome' => 'Substituição de peças de smartphones',
                    'custo' => 17.00,
                    'description' => 'Troca de componentes danificados em smartphones.',
                ],

                // Serviços para Computadores
                [
                    'id' => 4,
                    'categoria' => 1, // Computadores
                    'serviceNome' => 'Limpeza de computadores',
                    'custo' => 10.00,
                    'description' => 'Serviço de limpeza interna e externa de computadores.',
                ],
                [
                    'id' => 5,
                    'categoria' => 1, // Computadores
                    'serviceNome' => 'Conserto de computadores',
                    'custo' => 18.00,
                    'description' => 'Reparo de hardware e software em computadores.',
                ],
                [
                    'id' => 6,
                    'categoria' => 1, // Computadores
                    'serviceNome' => 'Substituição de peças de computadores',
                    'custo' => 12.00,
                    'description' => 'Troca de componentes defeituosos em computadores.',
                ],

                // Serviços para Outros Equipamentos
                [
                    'id' => 7,
                    'categoria' => 3, // Outros equipamentos
                    'serviceNome' => 'Limpeza de outros equipamentos',
                    'custo' => 5.00,
                    'description' => 'Serviço de limpeza de vários tipos de equipamentos.',
                ],
                [
                    'id' => 8,
                    'categoria' => 3, // Outros equipamentos
                    'serviceNome' => 'Conserto de outros equipamentos',
                    'custo' => 10.00,
                    'description' => 'Reparo de diversos equipamentos eletrônicos.',
                ],
                [
                    'id' => 9,
                    'categoria' => 3, // Outros equipamentos
                    'serviceNome' => 'Substituição de peças de outros equipamentos',
                    'custo' => 14.00,
                    'description' => 'Troca de peças em vários tipos de equipamentos.',
                ]
            ]);
        }
    }
}

