<?php

use Illuminate\Database\Seeder;

class TemariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('temarios')->insert([
       'titulo' => 'tema 1 MAT315',
       'unidad_id' => 3,
      ]);

      DB::table('temarios')->insert([
       'titulo' => 'tema 2 MAT315',
       'unidad_id' => 3,
      ]);
    }
}
