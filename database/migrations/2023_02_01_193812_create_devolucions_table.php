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
        Schema::create('devolucions', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('prestamos_id')->index('devolucions_prestamos_id_foreign');
            $table->unsignedBigInteger('libros_id')->nullable()->index('devolucions_libros_id_foreign');
            $table->unsignedBigInteger('elementos_id')->nullable()->index('devolucions_elementos_id_foreign');
            $table->unsignedBigInteger('usuario_id')->index('devolucions_usuario_id_foreign');
            $table->unsignedBigInteger('curso_id')->nullable()->index('devolucions_curso_id_foreign');
            $table->timestamps();
            $table->softDeletes();
            $table->enum('Estado_Devolucion', ['Activa', 'Inactiva'])->default('Activa');
            $table->integer('Cantidad_Devuelta');
            $table->unsignedBigInteger('prestador_id')->nullable()->index('devolucions_bibliotecario_id_foreign');
            $table->string('Bibliotecario_Re', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devolucions');
    }
};
