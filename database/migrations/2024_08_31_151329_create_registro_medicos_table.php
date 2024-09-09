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
        Schema::create('registro_medicos', function (Blueprint $table) {
            $table->id();
            //add the foreing key
            $table->foreignId('animal_id')->constrained('animals')->onDelete('cascade');
            $table->float('peso');
            $table->text('medicamento');
            $table->text('dosis_frecuencia');
            $table->date('fecha_adm_medicamento');
            $table->text('vacuna');
            $table->date('fecha_apl_vacuna');
            $table->text('necesidades');
            $table->date('fecha_vis_medico');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_medicos');
    }
};
