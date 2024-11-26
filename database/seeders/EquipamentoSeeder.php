<?php

namespace Database\Seeders;

use App\Models\Marca;
use App\Models\Modelo;
use App\Models\modelo_id;
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
        $marca = new Marca();
        $marca->nome = 'Asus';
        $marca->save();

        $marca = new Marca();
        $marca->nome = 'Apple';
        $marca->save();

        $marca = new Marca();
        $marca->nome = 'HP';
        $marca->save();

        $marca = new Marca();
        $marca->nome = 'Dell';
        $marca->save();

        $marca = new Marca();
        $marca->nome = 'Toshiba';
        $marca->save();

        $marca = new Marca();
        $marca->nome = 'Gigabyte';
        $marca->save();

        $marca = new Marca();
        $marca->nome = 'MSI';
        $marca->save();

        $modelo = new Modelo();
        $modelo->marca_id = 2;
        $modelo->nome = 'MacBook Air';
        $modelo->save();

        $modelo = new Modelo();
        $modelo->marca_id = 4;
        $modelo->nome = 'XPS 13';
        $modelo->save();

        $modelo = new Modelo();
        $modelo->marca_id = 3;
        $modelo->nome = 'Envy x360';
        $modelo->save();

        DB::table('equipamentos')->insert([
            [
                'categoria_id' => '1', // computador
                'modelo_id' => 1, // Apple - MacBook Air
                'cliente_id' => 1, // João Silva
            ],
            [
                'categoria_id' => '1', // computador
                'modelo_id' => 2, // Dell - Inspiron 15
                'cliente_id' => 2, // Maria Santos
            ],
            [
                'categoria_id' => '1', // computador
                'modelo_id' => 1, // HP - Envy x360
                'cliente_id' => 3, // Pedro Gonçalves
            ],
            [
                'categoria_id' => '1', // computador
                'modelo_id' => 1, // Samsung - Galaxy Book
                'cliente_id' => 4, // Ana Rodrigues
            ],
            [
                'categoria_id' => '1', // computador
                'modelo_id' => 2, // Lenovo - ThinkPad X1
                'cliente_id' => 5, // Miguel Ferreira
            ],
            [
                'categoria_id' => '2', // smartphones
                'modelo_id' => 3, // Apple - iPhone 14 Pro Max
                'cliente_id' => 6, // Sofia Almeida
            ],
            [
                'categoria_id' => '2', // smartphones
                'modelo_id' => 3, // Samsung - Galaxy S23
                'cliente_id' => 7, // Tiago Oliveira
            ],
            [
                'categoria_id' => '2', // smartphones
                'modelo_id' => 2, // Asus - ROG Phone 6
                'cliente_id' => 8, // Clara Martins
            ],
            [
                'categoria_id' => '1', // computadores
                'modelo_id' => 1, // HP - Spectre x360
                'cliente_id' => 9, // Rui Costa
            ],
            [
                'categoria_id' => '1', // computadores
                'modelo_id' => 1, // Dell - XPS 13
                'cliente_id' => 10, // Inês Pereira
            ],
            [

                'categoria_id' => '3', // outros equipamentos
                'modelo_id' => 2, // G502 Hero
                'cliente_id' => 10, // Inês Pereira
            ],
            [

                'categoria_id' => '3', // outros equipamentos
                'modelo_id' => 1, // HP DeskJet 3630 Series
                'cliente_id' => 9, // Rui Costa
            ]
        ]);
    }
}

