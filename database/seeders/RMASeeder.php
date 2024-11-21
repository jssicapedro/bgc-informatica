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
                'equipamento_id' => 2,
                'encomenda_id' => 1,
                'dataChegada' => now(),
                'dataEntrega' => '2024-11-10',
                'horasTrabalho' => 5,
                'descricaoProblema' => 'Arranjo dos pinos dos na motherboard e do CPU, computador fixo',
                'estado' => 'em processamento',
                'qr' => 'QR_CODE_1'
            ],
            [
                'equipamento_id' => 1,
                'encomenda_id' => 2,
                'dataChegada' => now(),
                'dataEntrega' => '2024-11-10',
                'horasTrabalho' => 1,
                'descricaoProblema' => 'Limpeza de computador portátil',
                'estado' => 'em reparacao',
                'qr' => 'QR_CODE_1'
            ],
            [
                'equipamento_id' => 8,
                'encomenda_id' => 3,
                'dataChegada' => now(),
                'dataEntrega' => '2024-11-12',
                'horasTrabalho' => 2,
                'descricaoProblema' => 'Substituição de ecrã de smartphone',
                'estado' => 'em reparacao',
                'qr' => 'QR_CODE_3'
            ],
        ]);
    }
}


