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
        Schema::create('controls', function (Blueprint $table) {
            $table->id();
            $table->time('hora');
            $table->unsignedTinyInteger('estado');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->foreignId('empleado_id', 'id')->on('empleados');
            $table->foreignId('servicio_id', 'id')->on('servicios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('controls');
    }
};
