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
        Schema::create('meta_de_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('periodo_id');
            $table->unsignedBigInteger('hecho_id');
            $table->unsignedBigInteger('politica_id');
            $table->unsignedBigInteger('programa_id');
            $table->unsignedBigInteger('indicador_id');
            $table->unsignedBigInteger('user_id');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('indicador_meta');
            $table->string('peso');
            $table->string('linea_base');
            $table->string('year');
            $table->string('meta_year_1');
            $table->string('meta_year_2');
            $table->string('meta_year_3');
            $table->string('meta_year_4');
            $table->string('meta_cuatrienio');
            $table->string('recurso_year_1');
            $table->string('recurso_year_2');
            $table->string('recurso_year_3');
            $table->string('recurso_year_4');
            $table->string('recurso_cuatrienio');
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
        Schema::dropIfExists('meta_de_productos');
    }
};
