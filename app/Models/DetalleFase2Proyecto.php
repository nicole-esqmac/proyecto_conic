<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleFase2Proyecto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detalle_fase2_proyectos';

    protected $primaryKey = "id";

    protected $fillable = [
        'idFase2Proyectos',
        'dpi',
        'nombre',
        'apellido',
        'direccion'
    ];

    protected $guarded = [];

    public function fase2Proyectos()
    {
        return $this->hasOne(Fase2Proyecto::class, 'id', 'idFase2Proyectos');
    }
}
