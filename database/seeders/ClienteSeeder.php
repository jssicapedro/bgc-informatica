<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
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
            ],
            [
                'nome' => 'Miguel Ferreira',
                'email' => 'miguel.ferreira@example.com',
                'telemovel' => '956789012',
                'morada' => 'Rua E, 1213, Aveiro',
                'nif' => '567890123',
            ],
            [
                'nome' => 'Sofia Almeida',
                'email' => 'sofia.almeida@example.com',
                'telemovel' => '967890123',
                'morada' => 'Rua F, 1415, Faro',
                'nif' => '678901234',
            ],
            [
                'nome' => 'Tiago Oliveira',
                'email' => 'tiago.oliveira@example.com',
                'telemovel' => '978901234',
                'morada' => 'Rua G, 1617, Setúbal',
                'nif' => '789012345',
            ],
            [
                'nome' => 'Clara Martins',
                'email' => 'clara.martins@example.com',
                'telemovel' => '989012345',
                'morada' => 'Rua H, 1819, Évora',
                'nif' => '890123456',
            ],
            [
                'nome' => 'Rui Costa',
                'email' => 'rui.costa@example.com',
                'telemovel' => '991234567',
                'morada' => 'Rua I, 2021, Viseu',
                'nif' => '901234567',
            ],
            [
                'nome' => 'Inês Pereira',
                'email' => 'ines.pereira@example.com',
                'telemovel' => '992345678',
                'morada' => 'Rua J, 2223, Leiria',
                'nif' => '012345678',
            ]
        ]);
    }
}
