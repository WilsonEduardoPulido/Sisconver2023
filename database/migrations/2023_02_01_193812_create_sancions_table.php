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
        Schema::create('sancions', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('Descripcion');
            $table->enum('Estado', ['Activa', 'Inactiva'])->default('Activa');
            $table->unsignedBigInteger('usuario_id')->index('sancions_usuario_id_foreign');
            $table->timestamps();
            $table->softDeletes();
            $table->string('Bibliotecario', 65);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sancions');
    }
};
