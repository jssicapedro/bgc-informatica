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
                'MarcaModelo' => '1',
                'tipo' => 'Computadores',
                'numero_serie' => 'ABC123',
                'descricao' => 'Laptop Apple MacBook Air',
                'resolucao' => '2022-01-15',
                'entrada' => '2022-01-15',
                'levantamento' => '2022-01-20',
                'qr' => 'QR123',
            ],
            [
                'MarcaModelo' => '1',
                'tipo' => 'Computadores',
                'numero_serie' => 'ABC123',
                'descricao' => 'Laptop Apple MacBook Air',
                'resolucao' => '2022-01-15',
                'entrada' => '2022-01-15',
                'levantamento' => '2022-01-20',
                'qr' => 'QR123',
            ],
            [
                'MarcaModelo' => '1',
                'tipo' => 'Computadores',
                'numero_serie' => 'ABC123',
                'descricao' => 'Laptop Apple MacBook Air',
                'resolucao' => '2022-01-15',
                'entrada' => '2022-01-15',
                'levantamento' => '2022-01-20',
                'qr' => 'QR123', 
            ],
            [
                'MarcaModelo' => '1',
                'tipo' => 'Computadores',
                'numero_serie' => 'ABC123',
                'descricao' => 'Laptop Apple MacBook Air',
                'resolucao' => '2022-01-15',
                'entrada' => '2022-01-15',
                'levantamento' => '2022-01-20',
                'qr' => 'QR123', 
            ],
            [
                'MarcaModelo' => '1',
                'tipo' => 'Computadores',
                'numero_serie' => 'ABC123',
                'descricao' => 'Laptop Apple MacBook Air',
                'resolucao' => '2022-01-15',
                'entrada' => '2022-01-15',
                'levantamento' => '2022-01-20',
                'qr' => 'QR123', 
            ]
        ]); //
    }
}
