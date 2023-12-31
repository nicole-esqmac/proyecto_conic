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
        Schema::create('plan_cuentas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('idClaseCuenta');
            $table->foreign('idClaseCuenta')->references('id')->on('clase_cuentas')->cascadeOnDelete();
            $table->unsignedBigInteger('idGrupoCuenta');
            $table->foreign('idGrupoCuenta')->references('id')->on('grupo_cuentas')->cascadeOnDelete();
            $table->unsignedBigInteger('idEstadoFinanciero');
            $table->foreign('idEstadoFinanciero')->references('id')->on('estado_financieros')->cascadeOnDelete();
            $table->string('codigo_pc');
            $table->string('cuenta_pc');
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
        Schema::dropIfExists('plan_cuentas');
    }
};
