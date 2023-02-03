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
        Schema::create('categorias', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->enum('Tipo', ['Libros', 'Elementos']);
            $table->timestamps();
            $table->softDeletes();
            $table->enum('Estado', ['Activa', 'Inactiva']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
