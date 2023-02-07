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
            $table->unsignedBigInteger('usuario_id')->index('devolucions_usuario_id_foreign');
            $table->timestamps();
            $table->softDeletes();
            $table->enum('Estado_Devolucion', ['Activa', 'Inactiva'])->default('Activa');
            $table->string('Bibliotecario_Re', 60);
            $table->enum('Tipo_Elemento', ['Libro', 'Elemento']);
            $table->string('CodigoDevolucion', 15);
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
