<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleLibroMovimiento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='detalle_libro_movimientos';

    protected $primaryKey='id';

    protected $fillable =[
        'codigo',
        'cuenta',
        'debitosLD',
        'creditosLD',
        'debitosSI',
        'creditosSI'
    ];

    protected $guarded =[

    ];

    public function relacion()
    {
        return $this->hasMany(RelacionIdLibroCuentaAuxiliar::class, 'id_libro_cuenta_auxiliar');
    }
}
