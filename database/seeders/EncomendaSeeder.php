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
                'nome' => 'João Silva',
                'email' => 'joao.silva@example.com',
                'telemovel' => '912345678',
                'morada' => 'Rua A, 123, Lisboa',
                'nif' => '123456789',
            ],
            [
                'nome' => 'Maria Santos',
                'email' => 'maria.santos@example.com',
                'telemovel' => '923456789',
                'morada' => 'Rua B, 456, Porto',
                'nif' => '234567890',
            ],
            [
                'nome' => 'Pedro Gonçalves',
                'email' => 'pedro.goncalves@example.com',
                'telemovel' => '934567890',
                'morada' => 'Rua C, 789, Braga',
                'nif' => '345678901',
            ],
            [
                'nome' => 'Ana Rodrigues',
                'email' => 'ana.rodrigues@example.com',
                'telemovel' => '945678901',
                'morada' => 'Rua D, 1011, Coimbra',
                'nif' => '456789012',
            ]
        ]);
    }
}
