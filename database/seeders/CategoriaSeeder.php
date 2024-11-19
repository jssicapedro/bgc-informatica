<?php

namespace Database\Seeders;

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
        DB::table('categoria')->insert([
            [
                'categoria' => 'computarores', // #id 1
                
            ],
            [
                'categoria' => 'smartphones', // #id 2
                
            ],
            [
                'categoria' => 'outros equipamentos', // #id 3
                
            ],
            
        ]);
    }
}
