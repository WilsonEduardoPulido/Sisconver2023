<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('Nombre', 60);
            $table->string('Autor');
            $table->string('Editorial');
            $table->string('Edicion', 50);
            $table->text('Descripcion')->nullable();
            $table->enum('Estado', ['Disponible', 'NoDisponible', 'Inactivo', 'Agotado'])->default('Disponible');
            $table->unsignedBigInteger('categoria_id')->index('libros_categoria_id_foreign');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('CantidadLibros');
            $table->string('NombreTomo', 60)->nullable();
            $table->string('Novedades', 200)->default('Ninguna');
            $table->enum('TipoNovedad', ['Alta', 'Media', 'Ninguna'])->default('Ninguna');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
};
