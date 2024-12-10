<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RmaServicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rma_servico')->insert([
            [
                'rma_id' => 1,
                'servico_id' => 5,
                'tecnico_id' => 1,
                'horas' => 0,
            ],
            [
                'rma_id' => 1,
                'servico_id' => 4,
                'tecnico_id' => 3,
                'horas' => 0,
            ],
            [
                'rma_id' => 2,
                'servico_id' => 4,
                'tecnico_id' => 3,
                'horas' => 0,
            ],
            [
                'rma_id' => 3,
                'servico_id' => 2,
                'tecnico_id' => 4,
                'horas' => 0,
            ]
        ]);
    }
}
