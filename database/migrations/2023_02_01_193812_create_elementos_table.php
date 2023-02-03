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
        Schema::create('elementos', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('cantidad');
            $table->string('descripcion');
            $table->string('NovedadesElemento', 200);
            $table->enum('TipoNovedad', ['Alta', 'Media', 'Ninguna'])->default('Ninguna');
            $table->enum('Estado', ['Disponible', 'Agotado', 'Inactivo', 'NoDisponible'])->default('Disponible');
            $table->unsignedBigInteger('categoria_id')->index('elementos_categoria_id_foreign');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elementos');
    }
};
