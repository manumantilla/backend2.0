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
        Schema::create('empleado_trabajo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trabajo_id')->constrained('trabajo')->onDelete('cascade');
            $table->foreignId('empleado_id')->constrained('empleado')->onDelete('cascade');
            $table->string('descripcion');
            $table->float('pago');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_trabajo');
    }
};
