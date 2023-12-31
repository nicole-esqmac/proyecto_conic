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
        Schema::create('fase1_proyectos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora');
            $table->unsignedBigInteger('idResponsableProyecto');
            $table->foreign('idResponsableProyecto')->references('id')->on('responsable_proyectos')->cascadeOnDelete();
            $table->string('tipo_banco');
            $table->string('cantidad_por_persona');
            $table->string('monto');
            $table->string('photo');
            $table->string('direccion_area');
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
        Schema::dropIfExists('fase1_proyectos');
    }
};
