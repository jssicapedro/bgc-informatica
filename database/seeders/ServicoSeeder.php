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
            DB::table('servico')->insert([
                    // Serviços para Smartphones (Carlos Mendes)
                [
                    'id' => 1,
                    'categoria' => 1,
                    'serviceNome' => 'Limpeza de smartphones',
                    'custo' => 50.00,
                    'description' => 'Serviço de limpeza completo para smartphones.',
                ],
                [
                    'id' => 2,
                    'tecnico' => 1,
                    'serviceNome' => 'Conserto de smartphones',
                    'custo' => 120.00,
                    'description' => 'Reparo de problemas comuns em smartphones.',
                ],
                [
                    'id' => 3,
                    'tecnico' => 1,
                    'serviceNome' => 'Substituição de peças de smartphones',
                    'custo' => 150.00,
                    'description' => 'Troca de componentes danificados em smartphones.',
                ],

                // Serviços para Computadores (Luís Pinto)
                [
                    'id' => 4,
                    'categoria' => 2,
                    'serviceNome' => 'Limpeza de computadores',
                    'custo' => 60.00,
                    'description' => 'Serviço de limpeza interna e externa de computadores.',
                ],
                [
                    'id' => 5,
                    'tecnico' => 2,
                    'serviceNome' => 'Conserto de computadores',
                    'custo' => 150.00,
                    'description' => 'Reparo de hardware e software em computadores.',
                ],
                [
                    'id' => 6,
                    'tecnico' => 2,
                    'serviceNome' => 'Substituição de peças de computadores',
                    'custo' => 210.00,
                    'description' => 'Troca de componentes defeituosos em computadores.',
                ],

                // Serviços para Outros Equipamentos (Sara Ferreira)
                [
                    'id' => 7,
                    'categoria' => 3,
                    'serviceNome' => 'Limpeza de outros equipamentos',
                    'custo' => 55.00,
                    'description' => 'Serviço de limpeza de vários tipos de equipamentos.',
                ],
                [
                    'id' => 8,
                    'tecnico' => 3,
                    'serviceNome' => 'Conserto de outros equipamentos',
                    'custo' => 110.00,
                    'description' => 'Reparo de diversos equipamentos eletrônicos.',
                ],
                [
                    'id' => 9,
                    'tecnico' => 3,
                    'serviceNome' => 'Substituição de peças de outros equipamentos',
                    'custo' => 165.00,
                    'description' => 'Troca de peças em vários tipos de equipamentos.',
                ],

            ]);
        }
    }
}
