<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetallePlanCuentaAuxiliar extends Model
{
    use HasFactory , SoftDeletes;

    protected $table='detalle_plan_cuenta_auxiliars';

    protected $primaryKey='id';

    protected $fillable =[
        'idPlanCuentas',
        'codigo',
        'cuenta'
    ];

    protected $guarded =[

    ];

    public function planCuentaAuxiliar()
    {
        return $this->hasOne(PlanCuenta::class, 'id', 'idPlanCuentas');
    }
}
