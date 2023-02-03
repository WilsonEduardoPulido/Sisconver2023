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
        Schema::create('detalle_prestamo', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_libro')->nullable()->index('libro_fk');
            $table->unsignedBigInteger('id_elemento')->nullable()->index('elemento_fk');
            $table->integer('CantidaPrestadaU');
            $table->string('NovedadesPrestamoU', 60);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->softDeletes();
            $table->unsignedBigInteger('id_prestamo')->index('prestamo_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_prestamo');
    }
};
