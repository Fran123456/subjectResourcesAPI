<?php

use Illuminate\Database\Seeder;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('materias')->insert([
       'siglas' => 'MAT115',
       'titulo' => 'Matemáticas I',
      ]);

      DB::table('materias')->insert([
       'siglas' => 'MAT315',
       'titulo' => 'Matemáticas III',
      ]);
    }
}
