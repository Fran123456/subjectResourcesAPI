<?php

use Illuminate\Database\Seeder;

class ContenidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('contenidos')->insert([
       'titulo' => 'contenido 1',
       'pdf' => "https://www.cimat.mx/ciencia_para_jovenes/bachillerato/libros/%5BPurcell,Varberg,Rigdon%5DCalculo/%5BPurcell,Varberg,Rigdon%5DCalculo_cap1.pdf",
       'temario_id' => 1
      ]);
    }
}
