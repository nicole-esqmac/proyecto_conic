<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleLibroDiario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='detalle_libro_diarios';

    protected $primaryKey='id';

    protected $fillable =[
        'idLibroDiarios',
        'codigo',
        'cuenta',
        'debitosLD',
        'creditosLD',
        'totalDebitosLD',
        'totalCreditosLD'
    ];

    protected $guarded =[

    ];

    public function libroDiarios()
    {
        return $this->belongsTo(LibroDiario::class, 'id');
    }

    public function planCuenta()
    {
        return $this->belongsTo(PlanCuenta::class, 'idPlanCuenta', 'id');
    }

    public function libroDiario()// nombre de la funcion
    {
        //Aquí se declaran el nombre modelo y llamar a sus atribbutos
        return $this->hasOne(LibroDiario::class, 'id', 'idLibroDiarios');
    }
}
