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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('usuario_id')->index('prestamos_usuario_id_foreign');
            $table->timestamps();
            $table->softDeletes();
            $table->enum('Estado_Prestamo', ['Activo', 'Inactivo', 'Finalizado'])->default('Activo');
            $table->enum('Tipo_Elemento', ['Libro', 'Elemento']);
            $table->string('NombreBibliotecario', 60);
            $table->string('Codigo_Prestamo', 16);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
};
