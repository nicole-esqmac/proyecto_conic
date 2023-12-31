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
        Schema::create('detalle_saldo_inicials', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('idSaldoInicial')
                  ->nullable()
                  ->constrained('saldo_inicials')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->string('codigo');
            $table->string('cuenta');
            $table->decimal('debitosSI', $precision = 15, $scale = 2);
            $table->decimal('creditosSI', $precision = 15, $scale = 2);
            $table->decimal('totalDebitosSI', $precision = 15, $scale = 2);
            $table->decimal('totalCreditosSI', $precision = 15, $scale = 2);
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
        Schema::dropIfExists('detalle_saldo_inicials');
    }
};
