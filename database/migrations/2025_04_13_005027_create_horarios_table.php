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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
            $table->unsignedBigInteger('aulas_id');
            $table->unsignedBigInteger('cursos_id');
            $table->unsignedBigInteger('docentes_id');
            $table->foreign('aulas_id')->references('id')->on('aulas')->onDelete('cascade');
            $table->foreign('cursos_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('docentes_id')->references('id')->on('docentes')->onDelete('cascade');
            $table->string('estado', 10)->default('activo');
            $table->string('tipo', 10)->default('teoria');
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
        Schema::dropIfExists('horarios');
    }
};
