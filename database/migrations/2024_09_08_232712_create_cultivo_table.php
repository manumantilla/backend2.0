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
            $table->date('fecha_siembra')->nullable();
            $table->date('fecha_cosecha')->nullable();
            $table->float('area');  
            $table->float('gasto')->nullable();
            $table->float('ph');
            $table->string('tratamiento');
            $table->float('rendimiento')->nullable();
            $table->enum('estado',['activo','inactivo']);
            $table->enum('etapa',['semillero','desplante','enraizamiento','engrosamiento','cosecha'])->nullable();    
            $table->float('latitude',10,7)->nullable();
            $table->float('longitude',10,7)->nullable();
            $table->string('foto')->nullable();
            $table->float('bultos_abono');
            $table->float('semilla');
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
