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
                'Equipamento' => '1',
                'Descricao' => 'Laptop não liga',
                'Estado' => 'A processar',
                'Data-Criacao' => '2022-01-01',
            ],
            [
                'Equipamento' => '2',
                'Descricao' => 'Mouse não funciona',
                'Estado' => 'Em reparacao',
                'Data-Criacao' => '2022-02-01',
            ],
            [
                'Equipamento' => '3',
                'Descricao' => 'HD Externo não é reconhecido',
                'Estado' => 'Completo',
                'Data-Criacao' => '2022-03-01',
            ],
            [
                'Equipamento' => '4',
                'Descricao' => 'Roteador não conecta à internet',
                'Estado' => 'A processar',
                'Data-Criacao' => '2022-04-01',
            ],
            [
                'Equipamento' => '5',
                'Descricao' => 'Modem não liga',
                'Estado' => 'Em reparacao',
                'Data-Criacao' => '2022-05-01',
            ]
        ]);
    }
}
