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
                'marcaModelo' => 1, // Apple - MacBook Air
                'cliente' => 1, // João Silva
                'type' => 'computadores'
            ],
            [
                'id' => 2,
                'marcaModelo' => 2, // Dell - Inspiron 15
                'cliente' => 2, // Maria Santos
                'type' => 'computadores'
            ],
            [
                'id' => 3,
                'marcaModelo' => 3, // HP - Envy x360
                'cliente' => 3, // Pedro Gonçalves
                'type' => 'computadores'
            ],
            [
                'id' => 4,
                'marcaModelo' => 4, // Samsung - Galaxy Book
                'cliente' => 4, // Ana Rodrigues
                'type' => 'computadores'
            ],
            [
                'id' => 5,
                'marcaModelo' => 5, // Lenovo - ThinkPad X1
                'cliente' => 5, // Miguel Ferreira
                'type' => 'computadores'
            ],
            [
                'id' => 6,
                'marcaModelo' => 6, // Apple - iPhone 14 Pro Max
                'cliente' => 6, // Sofia Almeida
                'type' => 'smartphones'
            ],
            [
                'id' => 7,
                'marcaModelo' => 7, // Samsung - Galaxy S23
                'cliente' => 7, // Tiago Oliveira
                'type' => 'smartphones'
            ],
            [
                'id' => 8,
                'marcaModelo' => 8, // Asus - ROG Phone 6
                'cliente' => 8, // Clara Martins
                'type' => 'smartphones'
            ],
            [
                'id' => 9,
                'marcaModelo' => 9, // HP - Spectre x360
                'cliente' => 9, // Rui Costa
                'type' => 'computadores'
            ],
            [
                'id' => 10,
                'marcaModelo' => 10, // Dell - XPS 13
                'cliente' => 10, // Inês Pereira
                'type' => 'computadores'
            ]
        ]); //
    }
}

