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
        Schema::create('nota_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('nombre_cliente');
            $table->string('nombre_empleado');
            $table->time('hora');    
            $table->string('firma_empleado')->nullable();
            $table->string('firma_cliente')->nullable();
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
        Schema::dropIfExists('nota_servicios');
    }
};
