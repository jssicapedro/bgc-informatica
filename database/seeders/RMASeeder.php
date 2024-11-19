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
                'id' => 1,
                'equipamento' => 2,
                'tecnico' => 1,
                'servico' => 5,
                'encomenda' => 0,
                'previsaoEntrega' => '2024-11-10',
                'horasTrabalho' => '05:00:00',
                'descricaoProblema' => 'Arranjo dos pinos dos na motherboard e do CPU, computador fixo',
                'estado' => 'em processamento',
                'qr' => 'QR_CODE_1'
            ],
            [
                'id' => 10,
                'equipamento' => 1,
                'tecnico' => 3,
                'servico' => 4,
                'encomenda' => 0,
                'previsaoEntrega' => '2024-11-10',
                'horasTrabalho' => '01:00:00',
                'descricaoProblema' => 'Limpeza de computador portátil',
                'estado' => 'em reparacao',
                'qr' => 'QR_CODE_1'
            ],
            [
                'id' => 3,
                'equipamento' => 8,
                'tecnico' => 4,
                'servico' => 2,
                'encomenda' => 3,
                'previsaoEntrega' => '2024-11-12',
                'horasTrabalho' => '02:00:00',
                'descricaoProblema' => 'Substituição de ecrã de smartphone',
                'estado' => 'em reparacao',
                'qr' => 'QR_CODE_3'
            ],
            [
                'id' => 4,
                'equipamento' => 11,
                'tecnico' => 2,
                'servico' => 9,
                'encomenda' => 4,
                'previsaoEntrega' => '2024-11-16',
                'horasTrabalho' => '02:00:00',
                'descricaoProblema' => 'Limpeza e substituição de sensor do rato',
                'estado' => 'completo',
                'qr' => 'QR_CODE_4'
            ],
        ]);
    }
}


