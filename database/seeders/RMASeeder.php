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
                'equipamentos' => 2,
                'tecnicos' => 1,
                'servicos' => 5,
                'encomendas' => 1,
                'dataChegada' => now(),
                'dataEntrega' => '2024-11-10',
                'horasTrabalho' => 5,
                'descricaoProblema' => 'Arranjo dos pinos dos na motherboard e do CPU, computador fixo',
                'estado' => 'em processamento',
                'qr' => 'QR_CODE_1'
            ],
            [
                'equipamentos' => 1,
                'tecnicos' => 3,
                'servicos' => 4,
                'encomendas' => 2,
                'dataChegada' => now(),
                'dataEntrega' => '2024-11-10',
                'horasTrabalho' => 1,
                'descricaoProblema' => 'Limpeza de computador portátil',
                'estado' => 'em reparacao',
                'qr' => 'QR_CODE_1'
            ],
            [
                'equipamentos' => 8,
                'tecnicos' => 4,
                'servicos' => 2,
                'encomendas' => 3,
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


