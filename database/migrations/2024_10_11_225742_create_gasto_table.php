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
        Schema::create('gasto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cultivo_id')->constrained('cultivo')->onDelete('cascade');
            $table->string('foto');
            $table->enum('tipo',['Fertilizante','Pesticida','Riego','Transporte','Daños Menores']);
            $table->enum('ciclo',['nacimiento','cura','abono','engrosamiento']);
            $table->string('responsable');
            $table->string('descripcion');
            $table->float('valor');
            $table->string('vendedor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gasto');
    }
};
