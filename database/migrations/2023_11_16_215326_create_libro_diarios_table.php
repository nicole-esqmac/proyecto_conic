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
        Schema::create('libro_diarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->dateTime('fecha_hora');
            $table->unsignedBigInteger('idEntidad');
            $table->foreign('idEntidad')->references('id')->on('entidads')->cascadeOnDelete();
            $table->string('descripcion');
            $table->decimal('total', $precision = 15, $scale = 2);
            $table->string('estado');
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
        Schema::dropIfExists('libro_diarios');
    }
};
