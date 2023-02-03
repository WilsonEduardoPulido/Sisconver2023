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
        Schema::create('users', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('lastname', 50);
            $table->string('email')->unique();
            $table->string('direccion', 38)->unique();
            $table->string('celular', 10)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
            $table->rememberToken();
            $table->enum('Estado', ['Activo', 'Inactivo', 'Sancionado'])->default('Activo');
            $table->enum('Grado', ['Prescolar', 'Primero', 'Segundo', 'Tercero', 'Cuarto', 'Quinto', 'Sexto', 'Septimo', 'Octavo', 'Noveno', 'Decimo', 'Undecimo', 'Otro']);
            $table->enum('TipoDoc', ['CC', 'TI', 'CI']);
            $table->string('NumeroDoc', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
