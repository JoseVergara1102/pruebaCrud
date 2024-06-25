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
        Schema::create('recursos', function (Blueprint $table) {
            $table->increments('Id_recurso');
            $table->string('Descripcion');
            $table->integer('Valor');
            $table->string('Unidad_de_medida');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        //
    }
};
