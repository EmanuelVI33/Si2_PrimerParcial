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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->unsignedInteger('total');
            $table->unsignedTinyInteger('estado');      
            $table->foreignId('direccion_servicio_id', 'id')->on('tipo_servicios')->delete('cascade')->nullable();
            $table->foreignId('nota_servicio_id', 'id')->on('nota_servicios')->delete('cascade')->nullable();  
            $table->foreignId('cliente_id', 'id')->on('clientes');  
            $table->foreignId('fumigacion_id')->on('fumigacions')->nullable();
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
        Schema::dropIfExists('servicios');
    }
};
