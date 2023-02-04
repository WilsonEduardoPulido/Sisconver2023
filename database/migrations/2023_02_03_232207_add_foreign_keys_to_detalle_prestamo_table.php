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
        Schema::table('detalle_prestamo', function (Blueprint $table) {
            $table->foreign(['id_elemento'], 'elemento_fk')->references(['id'])->on('elementos');
            $table->foreign(['id_libro'], 'libro_fk')->references(['id'])->on('libros');
            $table->foreign(['id_prestamo'], 'prestamo_fk')->references(['id'])->on('prestamos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_prestamo', function (Blueprint $table) {
            $table->dropForeign('elemento_fk');
            $table->dropForeign('libro_fk');
            $table->dropForeign('prestamo_fk');
        });
    }
};
