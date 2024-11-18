<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tecnicos')->insert([
            [
                'nome' => 'Bruno Cerqueira',
                'email' => 'bruno@empresa.com',
                'password' => bcrypt('12345678'),
                'telemovel' => '912345678',
                'especialidade' => 'todas',
            ],
            [
                'nome' => 'Maria Souza',
                'email' => 'maria@empresa.com',
                'password' => bcrypt('senha_secreta'),
                'telemovel' => '917654321',
                'especialidade' => 'outros equipamentos',
            ]
            ,
            [
                'nome' => 'João Silva',
                'email' => 'joao.silva@email.com',
                'password' => bcrypt('senha_secreta'),
                'telemovel' => '917657845',
                'especialidade' => 'computadores',
            ]
            ,
            [
                'nome' => 'Maria Costa',
                'email' => 'maria.costa@email.com',
                'password' => bcrypt('senha_secreta'),
                'telemovel' => '917698563',
                'especialidade' => 'smarphones',
            ]
            ]);
    }
}
