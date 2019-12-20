<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('unidades')->insert([
       'titulo' => 'Unidad 1',
       'materia_id' => 1,
      ]);

      DB::table('unidades')->insert([
       'titulo' => 'Unidad 2',
       'materia_id' => 1,
      ]);

      DB::table('unidades')->insert([
       'titulo' => 'Unidad 1',
       'materia_id' => 2,
      ]);

      DB::table('unidades')->insert([
       'titulo' => 'Unidad 2',
       'materia_id' => 2,
      ]);
    }
}
