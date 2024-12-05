<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RMASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rma')->insert([
            [
                'tecnico_id' => 1,
                'equipamento_id' => 2,
                'encomenda_id' => 1,
                'dataChegada' => '2024-11-10',
                'previsaoEntrega' => '2024-11-15',
                'dataEntrega' => '2024-11-20',
                'horasTrabalho' => 5,
                'totalPagar' => 0,
                'descricaoProblema' => 'Arranjo dos pinos dos na motherboard e do CPU, computador fixo',
                'estado' => 'completo'
            ],
            [
                'tecnico_id' => 1,
                'equipamento_id' => 1,
                'encomenda_id' => 2,
                'dataChegada' => '2024-11-10',
                'previsaoEntrega' => '2024-11-20',
                'dataEntrega' => '2024-11-22',
                'horasTrabalho' => 1,
                'totalPagar' => 0,
                'descricaoProblema' => 'Limpeza de computador portátil',
                'estado' => 'em reparacao'
            ],
            [
                'tecnico_id' => 1,
                'equipamento_id' => 8,
                'encomenda_id' => 3,
                'dataChegada' => '2024-11-10',
                'previsaoEntrega' => null,
                'dataEntrega' => now(),
                'horasTrabalho' => 2,
                'totalPagar' => 0,
                'descricaoProblema' => 'Substituição de ecrã de smartphone',
                'estado' => 'em reparacao',
            ],
        ]);
    }
}


