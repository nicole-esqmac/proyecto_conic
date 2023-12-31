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
        Schema::create('detalle_fase2_proyectos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('idFase2Proyectos')
                  ->nullable()
                  ->constrained('fase2_proyectos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->string('dpi');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
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
        Schema::dropIfExists('detalle_fase2_proyectos');
    }
};
