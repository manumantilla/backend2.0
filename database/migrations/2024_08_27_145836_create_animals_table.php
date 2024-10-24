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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('identificacion')->unique();
            $table->string('nombre')->nullable();
            $table->string('especie');
            $table->string('raza');
            $table->date('fecha_nacimiento');
            $table->date('fecha_ingreso');
            $table->string('origen')->nullable();   
            $table->enum('genero',['Macho','Hembra']);
            $table->string('estado')->default('Activo');
            $table->string('peso');
            $table->string('foto');
            $table->enum('etapa',['Cria','Levante','Ceba']);
            $table->decimal('latitude',10,7)->nullable();
            $table->decimal('longitude',10,7)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
