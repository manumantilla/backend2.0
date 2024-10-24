<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('cedula');
            $table->date('fecha_inicio');
            $table->string('foto');
            $table->decimal('numero');
            $table->decimal('numero_emergencia');
            $table->enum('tipo_contrato',['Prestacion_de_servicios','Horas','Planta']);
            $table->enum('estado',['Activo','Inactivo','Enfermo']);
            $table->string('nss'); //Nro de Seguridad Social
                                 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};
