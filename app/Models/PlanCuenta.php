<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanCuenta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='plan_cuentas';

    protected $primaryKey="id";

    protected $fillable =[
        'claseCuenta',
        'idClaseCuenta',
        'grupoCuenta',
        'idGrupoCuenta',
        'estadoFinanciero',
        'idEstadoFinanciero',
        'codigo_pc',
        'cuenta_pc'
    ];

    protected $guarded =[

    ];

    public function claseCuenta()
    {
        return $this->hasOne(ClaseCuenta::class, 'id', 'idClaseCuenta');
    }

    public function grupoCuenta()
    {
        return $this->hasOne(GrupoCuenta::class, 'id', 'idGrupoCuenta');
    }

    public function estadoFinanciero()
    {
        return $this->hasOne(EstadoFinanciero::class, 'id', 'idEstadoFinanciero');
    }

    public function detallesSaldoInicial()
    {
        return $this->hasMany(DetalleSaldoInicial::class, 'idPlanCuenta', 'id');
    }

    public function detallesLibroDiario()
    {
        return $this->hasMany(DetalleLibroDiario::class, 'idPlanCuenta', 'id');
    }

}
