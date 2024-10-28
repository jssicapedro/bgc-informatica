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
                'morada' => 'Rua do Porto, 123',
                'nif' => '123456789',
            ],
            [
                'nome' => 'Maria Costa',
                'email' => 'maria.costa@example.com',
                'telemovel' => '963852741',
                'morada' => 'Rua da Praia, 456',
                'nif' => '987654321',
            ],
            [
                'nome' => 'Pedro Martins',
                'email' => 'pedro.martins@example.com',
                'telemovel' => '987654321',
                'morada' => 'Rua do Centro, 789',
                'nif' => '111222333',
            ]
        ]);
    }
}
