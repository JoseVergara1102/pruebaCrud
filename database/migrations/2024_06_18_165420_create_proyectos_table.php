<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('Id_proyecto');
            $table->text('Descripcion');
            $table->date('Fecha_inicio');
            $table->date('Fecha_entrega');
            $table->integer('Valor');
            $table->string('Lugar', 255);
            $table->integer('Responsable')->nullable();
            $table->enum('Estado', ['Entregado', 'En Proceso', 'No Entregado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
