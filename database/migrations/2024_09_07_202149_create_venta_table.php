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
        Schema::create('venta', function (Blueprint $table) {
            $table->id();
            
            // Clave foránea relacionada con la tabla 'animals'
            $table->foreignId('animalId')->constrained('animals')->onDelete('cascade');
            
            // Usamos 'decimal' para manejar números con decimales
            $table->decimal('peso_venta', 8, 2);  // Ejemplo de peso en kg, hasta 999999.99
            $table->decimal('valor_kilo', 8, 2);  // Valor por kilo con decimales

            // Para textos, 'text' está bien
            $table->text('nombre_comprador');

            // Para números de contacto, es mejor usar 'string' en lugar de 'number'
            $table->string('contacto_comprador', 15);  // Ejemplo de campo para teléfono o contacto

            // Otros campos de tipo string
            $table->string('guia');
        
            // Campos 'created_at' y 'updated_at'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta');
    }
};
