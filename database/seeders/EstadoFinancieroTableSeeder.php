<?php

namespace Database\Seeders;

use App\Models\EstadoFinanciero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoFinancieroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadoFinanciero = [
            [
                'id'    => 1,
                'estadoFinanciero' => 'Estado de Situación Financiera'
            ],
            [
                'id'    => 2,
                'estadoFinanciero' => 'Estado de Resultados'
            ],

        ];

        EstadoFinanciero::insert($estadoFinanciero);
    }
}
