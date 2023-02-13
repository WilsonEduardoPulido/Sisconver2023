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
        Schema::create('detalle_devolucion', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_elementoD')->nullable();
            $table->unsignedBigInteger('id_libroD')->nullable();
            $table->integer('CantidaDevueltaU');
            $table->string('NovedadesDevolucionU', 120);
            $table->unsignedBigInteger('id_DevolucioD')->index('devolucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_devolucion');
    }
};
