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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->boolean('tipo');  // V indefinido, F con tiempo determinado
            $table->unsignedSmallInteger('duracion')->nullable();
            $table->date('fecha_inicio');
            $table->unsignedInteger('sueldo');
            $table->foreignId('cargo_id')->on('cargos');
            $table->foreignId('horario_id')->on('horarios');
            $table->foreignId('vacacion_id')->on('vacacions')->constrained()->uniqid()->onDelete('cascade');
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
        Schema::dropIfExists('contratos');
    }
};
