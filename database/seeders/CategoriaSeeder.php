<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria = new Categoria;
        $categoria->nome = 'Computadores';
        $categoria->save();

        $categoria = new Categoria;
        $categoria->nome = 'Smartphones';
        $categoria->save();

        $categoria = new Categoria;
        $categoria->nome = 'Notebooks';
        $categoria->save();
    }
}
