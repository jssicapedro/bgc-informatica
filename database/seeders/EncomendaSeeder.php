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
                'descricao' => 'Motherboard HP - Envy x360',
            ],
            [
                'custo' => '60',
                'descricao' => 'Teclado Lenovo - ThinkPad X1',
            ],
            [
                'custo' => '140',
                'descricao' => 'Ecrã Asus - ROG Phone 6',
            ],
            [
                'custo' => '75',
                'descricao' => 'Sensor Rato G505 Hero',
            ]
        ]);
    }
}
