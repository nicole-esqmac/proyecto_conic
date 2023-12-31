<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleSaldoInicial extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='detalle_saldo_inicials';

    protected $primaryKey="id";

    protected $fillable =[
        'codigo',
        'cuenta',
        'debitosSI',
        'creditosSI'
    ];

    protected $guarded =[

    ];

    public function planCuenta()
    {
        return $this->belongsTo(PlanCuenta::class, 'idPlanCuenta', 'id');
    }
}
