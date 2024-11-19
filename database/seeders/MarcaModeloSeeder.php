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
        DB::table('marcamodelos')->insert([
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
            ,
            [
                'Marca' => 'Apple',
                'Modelo' => 'iPhone 14 Pro Max',
            ]
            ,
            [
                'Marca' => 'Samsung',
                'Modelo' => 'Galaxy S23',
            ]
            ,
            [
                'Marca' => 'Asus',
                'Modelo' => 'ROG Phone 6',
            ]
            ,
            [
                'Marca' => 'HP',
                'Modelo' => 'Spectre x360',
            ]
            ,
            [
                'Marca' => 'Dell',
                'Modelo' => 'XPS 13',
            ]
            ,
            [
                'Marca' => 'HP',
                'Modelo' => 'HP DeskJet 3630 Series',
            ]
            ,
            [
                'Marca' => 'Logitech',
                'Modelo' => 'G502 Hero',
            ]
        ]);
    }
}
