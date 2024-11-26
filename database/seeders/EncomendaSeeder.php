<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EncomendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('encomendas')->insert([
            [
                'custo' => '250',
                'dataPedido' => now(),
                'descricao' => 'Motherboard HP - Envy x360',
            ],
            [
                'custo' => '60',
                'dataPedido' => now(),
                'descricao' => 'Teclado Lenovo - ThinkPad X1',
            ],
            [
                'custo' => '140',
                'dataPedido' => now(),
                'descricao' => 'Ecrã Asus - ROG Phone 6',
            ],
            [
                'custo' => '75',
                'dataPedido' => now(),
                'descricao' => 'Sensor Rato G505 Hero',
            ]
        ]);
    }
}
