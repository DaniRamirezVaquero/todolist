<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(EtiquetaTableSeeder::class);
        // $this->call(UsuarioTableSeeder::class);

        // \App\Models\Usuario::factory(10)->create();
        \App\Models\Tarea::factory(200)->create();

    }
}
