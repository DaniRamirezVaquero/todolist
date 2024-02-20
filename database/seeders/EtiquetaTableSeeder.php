<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetaTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('etiqueta')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    DB::table('etiqueta')->insert([
      [
        'etiqueta' => 'Estudios',
        'color' => 'cyan',
      ],
      [
        'etiqueta' => 'Trabajo',
        'color' => 'orange',
      ],
      [
        'etiqueta' => 'Personal',
        'color' => 'blue',
      ],
      [
        'etiqueta' => 'Ocio',
        'color' => 'pink',
      ],
      [
        'etiqueta' => 'Salud',
        'color' => 'green',
      ],
      [
        'etiqueta' => 'Importante',
        'color' => 'red',
      ]
    ]);
  }
}
