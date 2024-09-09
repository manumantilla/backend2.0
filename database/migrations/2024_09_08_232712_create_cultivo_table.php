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
        Schema::create('cultivo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_siembra');
            $table->date('fecha_cosecha');
            $table->decimal('area');
            $table->string('estado');   
            $table->decimal('gasto');
            $table->decimal('latitude',10,7)->nullable();
            $table->decimal('longitude',10,7)->nullable();
            $table->string('foto');
            $table->decimal('bultos_abono');
            $table->decimal('semilla');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultivo');
    }
};
