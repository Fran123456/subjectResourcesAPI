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
<<<<<<< HEAD
=======
       'orden'=> 1,
>>>>>>> 79a638e9f9c41aa6b8ffcdea6a106fa4bb575b34
      ]);

      DB::table('temarios')->insert([
       'titulo' => 'tema 2 MAT315',
       'unidad_id' => 3,
<<<<<<< HEAD
=======
       'orden'=> 2,
>>>>>>> 79a638e9f9c41aa6b8ffcdea6a106fa4bb575b34
      ]);
    }
}
