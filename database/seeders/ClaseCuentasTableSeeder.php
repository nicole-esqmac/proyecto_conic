<?php

namespace Database\Seeders;

use App\Models\ClaseCuenta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaseCuentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $claseCuenta = [
            [
                'id'    => 1,
                'codigo_cuenta' => '1',
                'nombre_cuenta' => 'ACTIVO'
            ],
            [
                'id'    => 2,
                'codigo_cuenta' => '2',
                'nombre_cuenta' => 'PASIVO'
            ],
            [
                'id'    => 3,
                'codigo_cuenta' => '3',
                'nombre_cuenta' => 'CAPITAL'
            ],
            [
                'id'    => 4,
                'codigo_cuenta' => '4',
                'nombre_cuenta' => 'PÉRDIDA'
            ],
            [
                'id'    => 5,
                'codigo_cuenta' => '5',
                'nombre_cuenta' => 'GANANCIA'
            ],
            [
                'id'    => 6,
                'codigo_cuenta' => '6',
                'nombre_cuenta' => 'CUENTAS DE ORDEN'
            ],

        ];

        ClaseCuenta::insert($claseCuenta);
    }
}
