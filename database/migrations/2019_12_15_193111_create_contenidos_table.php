<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('pdf')->nullable();
            $table->string('video')->nullable();
<<<<<<< HEAD
=======
            $table->string('url')->nullable();
>>>>>>> 79a638e9f9c41aa6b8ffcdea6a106fa4bb575b34
            $table->unsignedBigInteger('temario_id');
            $table->timestamps();

            //relacion
            $table->foreign('temario_id')->references('id')->on('temarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenidos');
    }
}
