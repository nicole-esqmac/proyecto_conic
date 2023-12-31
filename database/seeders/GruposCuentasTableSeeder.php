<?php

namespace Database\Seeders;

use App\Models\GrupoCuenta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GruposCuentasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupoCuentas = [
            [
                'id'    => 1,
                'codigo_cuenta' => '11',
                'nombre_cuenta' => 'Corriente'
            ],
            [
                'id'    => 2,
                'codigo_cuenta' => '12',
                'nombre_cuenta' => 'No Corriente'
            ],
            [
                'id'    => 3,
                'codigo_cuenta' => '21',
                'nombre_cuenta' => 'Corriente'
            ],
            [
                'id'    => 4,
                'codigo_cuenta' => '22',
                'nombre_cuenta' => 'No Corriente'
            ],
            [
                'id'    => 5,
                'codigo_cuenta' => '31',
                'nombre_cuenta' => 'Capital Social'
            ],
            [
                'id'    => 6,
                'codigo_cuenta' => '32',
                'nombre_cuenta' => 'Reservas'
            ],
            [
                'id'    => 7,
                'codigo_cuenta' => '33',
                'nombre_cuenta' => 'Resultados'
            ],
            [
                'id'    => 8,
                'codigo_cuenta' => '41',
                'nombre_cuenta' => 'Costo de Venta'
            ],
            [
                'id'    => 9,
                'codigo_cuenta' => '42',
                'nombre_cuenta' => 'Gasto de Venta'
            ],
            [
                'id'    => 10,
                'codigo_cuenta' => '43',
                'nombre_cuenta' => 'Gastos de Administración'
            ],
            [
                'id'    => 11,
                'codigo_cuenta' => '44',
                'nombre_cuenta' => 'Otros Gastos'
            ],
            [
                'id'    => 12,
                'codigo_cuenta' => '51',
                'nombre_cuenta' => 'Ingresos Corrientes'
            ],
            [
                'id'    => 13,
                'codigo_cuenta' => '52',
                'nombre_cuenta' => 'Ingresos No Corrientes'
            ],
            [
                'id'    => 14,
                'codigo_cuenta' => '61',
                'nombre_cuenta' => 'Cuentas de Orden Débito'
            ],
            [
                'id'    => 15,
                'codigo_cuenta' => '62',
                'nombre_cuenta' => 'Cuentas de Orden Crédito'
            ],

        ];

        GrupoCuenta::insert($grupoCuentas);
    }
}
