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
        Schema::create('detalle_libro_movimientos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('idLibroMovimiento')
            ->nullable()
            ->constrained('libro_movimientos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->string('codigo');
            $table->string('cuenta');
            $table->string('debitosLD', null);
            $table->string('creditosLD', null);
            $table->string('debitosSI', null);
            $table->string('creditosSI', null);
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
        Schema::dropIfExists('detalle_libro_movimientos');
    }
};
