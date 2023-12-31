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
        Schema::create('fase2_proyectos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idResponsableProyecto');
            $table->foreign('idResponsableProyecto')->references('id')->on('responsable_proyectos')->cascadeOnDelete();
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
        Schema::dropIfExists('fase2_proyectos');
    }
};
