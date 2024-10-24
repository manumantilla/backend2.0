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
        Schema::create('envio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cultivo_id')->constrained('cultivo')->onDelete('cascade');
            $table->float('peso');
            $table->float('bultos_calidad_alta');
            $table->float('bultos_calidad_media');
            $table->float('bultos_calidad_baja');
            $table->float('costos_generales');
            $table->string('placa_vehiculo');
            $table->string('nombre_conductor');
            $table->float('valor_flete');
            $table->date('fecha_envio');
            $table->float('valor_bultos_calidad_alta');
            $table->float('valor_bultos_calidad_media');
            $table->float('valor_bultos_calidad_baja');
            $table->string('comprador');
            $table->enum('estado',['viaje','centroabastos','deuda','pago']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envio');
    }
};
