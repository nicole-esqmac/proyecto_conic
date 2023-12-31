<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClaseCuenta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='clase_cuentas';

    protected $primaryKey="id";

    protected $fillable =[
        'codigo_cuenta',
        'nombre_cuenta'
    ];

    protected $guarded =[

    ];

    // public function registro_cuenta()
    // {
    //     return $this->hasOne(PlanCuenta::class, 'id', 'idClaseCuenta');
    // }
}
