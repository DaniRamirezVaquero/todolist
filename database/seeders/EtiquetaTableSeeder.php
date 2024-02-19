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
        'color' => '#7e22ce',
      ],
      [
        'etiqueta' => 'Trabajo',
        'color' => '#a16207',
      ],
      [
        'etiqueta' => 'Personal',
        'color' => '#0e7490',
      ],
      [
        'etiqueta' => 'Ocio',
        'color' => '#c2410c',
      ],
      [
        'etiqueta' => 'Salud',
        'color' => '#15803d',
      ]
    ]);
  }
}
