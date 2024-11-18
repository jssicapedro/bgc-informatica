<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marcasmodelos')->insert([
            [
                'Marca' => 'Apple',
                'Modelo' => 'MacBook Air',
            ],
            [
                'Marca' => 'Dell',
                'Modelo' => 'Inspiron 15',
            ]
            ,
            [
                'Marca' => 'HP',
                'Modelo' => 'Envy x360',
            ]
            ,
            [
                'Marca' => 'Samsung',
                'Modelo' => 'Galaxy Book',
            ]
            ,
            [
                'Marca' => 'Lenovo',
                'Modelo' => 'ThinkPad X1',
            ]
        ]);
    }
}
