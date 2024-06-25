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
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('Id_persona');
            $table->string('Nombre', 255);
            $table->string('Apellidos', 255);
            $table->string('Direccion', 255);
            $table->string('Telefono', 20);
            $table->enum('Sexo', ['Masculino', 'Femenino']);
            $table->string('Profesion', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
