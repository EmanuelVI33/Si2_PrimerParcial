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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->unsignedBigInteger('ci');
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('telefono')->nullable();
            $table->char('estado');   // Libre, Ocupado, Deshabilitado  L O D
            $table->foreignId('user_id', 'id')->on('users')->constrained()->delete('cascade'); 
            $table->foreignId('contrato_id', 'id')->on('contratos')->delete('cascade')->nullable();
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
        Schema::dropIfExists('empleados');
    }
};
