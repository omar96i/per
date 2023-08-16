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
            $table->unsignedBigInteger('meta_de_producto_id')->nullable();
            $table->text('meta_alcanzada')->nullable();
            $table->text('nueva_actividad')->nullable();
            $table->string('codigo')->nullable();
            $table->string('linea_base')->nullable();
            $table->text('definiciones')->nullable();
            $table->string('medicion')->nullable();
            $table->string('formula')->nullable();
            $table->string('variables')->nullable();
            $table->string('fuente')->nullable();
            $table->string('localizacion')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('periocidad')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('actividades_realizadas')->nullable();
            $table->text('archivos')->nullable();
            $table->string('tipo')->nullable();
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
