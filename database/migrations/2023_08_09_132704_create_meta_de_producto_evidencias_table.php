<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_de_producto_evidencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meta_de_producto_id');
            $table->text('meta_alcanzada');
            $table->text('nueva_actividad');
            $table->string('codigo');
            $table->string('linea_base');
            $table->text('definiciones');
            $table->string('medicion');
            $table->string('formula');
            $table->string('variables');
            $table->string('fuente');
            $table->string('localizacion');
            $table->string('poblacion');
            $table->string('periocidad');
            $table->text('observaciones');
            $table->text('actividades_realizadas');
            $table->text('archivos');
            $table->string('tipo');
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
        Schema::dropIfExists('meta_de_producto_evidencias');
    }
};
