<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('unidad_id');
<<<<<<< HEAD
            $table->timestamps();

=======
            $table->integer('orden')->nullable();
            $table->timestamps();
>>>>>>> 79a638e9f9c41aa6b8ffcdea6a106fa4bb575b34
            //relacion
            $table->foreign('unidad_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temarios');
    }
}
