<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipamentos')->insert([
            [
                'id' => 1,
                'categoria' => '1', // computador
                'marcaModelo' => 1, // Apple - MacBook Air
                'cliente' => 1, // João Silva
            ],
            [
                'id' => 2,
                'categoria' => '1', // computador
                'marcaModelo' => 2, // Dell - Inspiron 15
                'cliente' => 2, // Maria Santos
            ],
            [
                'id' => 3,
                'categoria' => '1', // computador
                'marcaModelo' => 3, // HP - Envy x360
                'cliente' => 3, // Pedro Gonçalves
            ],
            [
                'id' => 4,
                'categoria' => '1', // computador
                'marcaModelo' => 4, // Samsung - Galaxy Book
                'cliente' => 4, // Ana Rodrigues 
            ],
            [
                'id' => 5,
                'categoria' => '1', // computador
                'marcaModelo' => 5, // Lenovo - ThinkPad X1
                'cliente' => 5, // Miguel Ferreira
            ],
            [
                'id' => 6,
                'categoria' => '2', // smartphones
                'marcaModelo' => 6, // Apple - iPhone 14 Pro Max
                'cliente' => 6, // Sofia Almeida
            ],
            [
                'id' => 7,
                'categoria' => '2', // smartphones
                'marcaModelo' => 7, // Samsung - Galaxy S23
                'cliente' => 7, // Tiago Oliveira
            ],
            [
                'id' => 8,
                'categoria' => '2', // smartphones
                'marcaModelo' => 8, // Asus - ROG Phone 6
                'cliente' => 8, // Clara Martins
            ],
            [
                'id' => 9,
                'categoria' => '1', // computadores
                'marcaModelo' => 9, // HP - Spectre x360
                'cliente' => 9, // Rui Costa
            ],
            [
                'id' => 10,
                'categoria' => '1', // computadores
                'marcaModelo' => 10, // Dell - XPS 13
                'cliente' => 10, // Inês Pereira
            ],
            [
                'id' => 11,
                'categoria' => '3', // outros equipamentos
                'marcaModelo' => 12, // G502 Hero
                'cliente' => 19, // Inês Pereira
            ],
            [
                'id' => 12,
                'categoria' => '3', // outros equipamentos
                'marcaModelo' => 11, // HP DeskJet 3630 Series
                'cliente' => 9, // Rui Costa
            ]
        ]);
    }
}

