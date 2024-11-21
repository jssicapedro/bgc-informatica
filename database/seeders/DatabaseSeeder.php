<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ClienteSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(EquipamentoSeeder::class);
        $this->call(TecnicoSeeder::class);
        $this->call(ServicoSeeder::class);
        $this->call(EncomendaSeeder::class);
        $this->call(RMASeeder::class);

    }
}
