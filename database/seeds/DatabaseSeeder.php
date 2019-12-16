<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

         $this->call(MateriasTableSeeder::class);
         $this->call(UnidadesTableSeeder::class);

         $this->call(TemariosTableSeeder::class);
         $this->call(ContenidosTableSeeder::class);
    }
}
