<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoCuenta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='grupo_cuentas';

    protected $primaryKey="id";

    protected $fillable =[
        'codigo_cuenta',
        'nombre_cuenta'
    ];

    protected $guarded =[

    ];

    //FUNCION UNO A MUCHOS
    public function plan_cuenta()
    {
        return $this->hasOne(PlanCuenta::class);
    }
}
