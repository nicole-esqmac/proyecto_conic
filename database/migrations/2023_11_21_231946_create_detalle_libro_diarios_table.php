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
        Schema::create('detalle_libro_diarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('idLibroDiarios')
                  ->nullable()
                  ->constrained('libro_diarios')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->string('codigo');
            $table->string('cuenta');
            $table->decimal('debitosLD', $precision = 15, $scale = 2);
            $table->decimal('creditosLD', $precision = 15, $scale = 2);
            $table->decimal('totalDebitosLD', $precision = 15, $scale = 2);
            $table->decimal('totalCreditosLD', $precision = 15, $scale = 2);
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
        Schema::dropIfExists('detalle_libro_diarios');
    }
};
