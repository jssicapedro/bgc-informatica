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
            DB::table('clientes')->insert([
                [
                    'RMA' => '1',
                    'Valor' => '100.00',
                    'Descricao' => 'Dívida para reparo de laptop',
                    'Data-inicio' => '2022-01-01',
                    'Estado' => 'Processando',
                ],
                [
                    'RMA' => '2',
                    'Valor' => '50.00',
                    'Descricao' => 'Dívida para reparo de mouse',
                    'Data-inicio' => '2022-01-01',
                    'Estado' => 'Aceite',
                ],
                [
                    'RMA' => '3',
                    'Valor' => '200.00',
                    'Descricao' => 'Dívida para reparo de mouse',
                    'Data-inicio' => '2022-03-01',
                    'Estado' => 'Rejeitado',  
                ],
                [
                    'RMA' => '4',
                    'Valor' => '150.00',
                    'Descricao' => 'Dívida para reparo de roteador',
                    'Data-inicio' => '2022-04-01',
                    'Estado' => 'Processando',  
                ],
                [
                    'RMA' => '5',
                    'Valor' => '250.00',
                    'Descricao' => 'Dívida para reparo de mouse',
                    'Data-inicio' => '2022-05-01',
                    'Estado' => 'Aceite',  
                ]
            ]);
        }
    }
}
