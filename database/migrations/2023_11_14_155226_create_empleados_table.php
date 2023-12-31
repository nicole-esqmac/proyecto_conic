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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('dpi', 13);
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->date('fechadenacimiento');
            $table->string('telefono',8);
            $table->string('celular',8);
            $table->text('direccion', 200);
            $table->decimal('salario',10,2);
            $table->char('sexo');
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
        Schema::dropIfExists('empleados');
    }
};
