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
        Schema::table('devolucions', function (Blueprint $table) {
            $table->foreign(['prestamos_id'])->references(['id'])->on('prestamos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['usuario_id'])->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devolucions', function (Blueprint $table) {
            $table->dropForeign('devolucions_prestamos_id_foreign');
            $table->dropForeign('devolucions_usuario_id_foreign');
        });
    }
};
