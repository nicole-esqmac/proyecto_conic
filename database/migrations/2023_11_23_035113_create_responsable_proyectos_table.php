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
        Schema::create('responsable_proyectos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('idProyecto');
            $table->foreign('idProyecto')->references('id')->on('proyectos')->cascadeOnDelete();
            $table->dateTime('fecha_hora');
            $table->string('tipoDocumento');
            $table->string('documento');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('edad');
            $table->string('sexo');
            $table->string('telefono',8);
            $table->string('celular',8);
            $table->string('estado');
            $table->string('direccion');
            $table->string('observacion');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsable_proyectos');
    }
};
