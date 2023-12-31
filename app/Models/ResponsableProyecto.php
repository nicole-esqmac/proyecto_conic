<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResponsableProyecto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='responsable_proyectos';

    protected $primaryKey="id";

    protected $fillable =[
        'proyecto',
        'idProyecto',
        'fecha_hora ',
        'tipoDocumento',
        'documento',
        'nombre',
        'apellido',
        'edad',
        'sexo',
        'telefono',
        'celular',
        'estado',
        'direccion',
        'observacion'
    ];

    protected $guarded =[

    ];

    public function proyectos()
    {
        return $this->hasOne(Proyecto::class, 'id', 'idProyecto');
    }
}
