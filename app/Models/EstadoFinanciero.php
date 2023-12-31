<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoFinanciero extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='estado_financieros';

    protected $primaryKey="id";

    protected $fillable =[
        'estadoFinanciero'
    ];

    protected $guarded =[

    ];

    //FUNCION UNO A MUCHOS
    public function plan_cuenta()
    {
        return $this->hasOne(PlanCuenta::class);
    }
}
