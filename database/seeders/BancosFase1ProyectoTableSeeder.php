<?php

namespace Database\Seeders;

use App\Models\BancoFase1Proyecto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BancosFase1ProyectoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bancoFase1Proyecto = [
            [
                'id'    => 1,
                'nombre_banco' => 'BANCO DE DESARROLLO RURAL, S. A.'
            ],
            [
                'id'    => 2,
                'nombre_banco' => 'BANCO G&T CONTINENTAL, S. A.'
            ],

        ];

        BancoFase1Proyecto::insert($bancoFase1Proyecto);
    }
}
