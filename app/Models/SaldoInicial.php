<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaldoInicial extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='saldo_inicials';

    protected $primaryKey="id";

    protected $fillable =[
        'fecha_registro',
        'idEntidad',
        'descripcion',
        'estado'
    ];

    protected $guarded =[

    ];

    public function saldoInicialEntidad()// nombre de la funcion
    {
        //Aquí se declaran el nombre modelo y llamar a sus atribbutos
        return $this->hasOne(Entidad::class, 'id', 'idEntidad');
    }
}
