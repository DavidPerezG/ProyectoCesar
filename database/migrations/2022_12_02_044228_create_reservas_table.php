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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vehiculo');
            $table->unsignedBigInteger('id_empleado');
            $table->string('destino');
            $table->date('fecha');
            $table->integer('kilometros');
            $table->timestamps();

            $table->foreign('id_vehiculo')->on('vehiculos')->references('id');
            $table->foreign('id_empleado')->on('empleados')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
