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
        Schema::create('trabajo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cultivo_id')->constrained('cultivo')->onDelete('cascade');
            $table->enum('tipo',['arado','fertilizacion inicial','abono','riego','tratamiento','cosecha','post-cosecha']);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('descripcion');
            $table->string('ubicacion');
            $table->enum('estado',['pendiente','en_trabajo','terminada']);
            $table->enum('prioridad',['baja','media','alta']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajo');
    }
};
