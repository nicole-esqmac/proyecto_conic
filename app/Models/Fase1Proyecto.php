<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fase1Proyecto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fase1_proyectos';

    protected $primaryKey = "id";

    protected $fillable = [
        'fecha_hora',
        'idResponsableProyecto',
        'tipo_banco',
        'cantidad_por_persona',
        'monto',
        'photo',
        'direccion_area',
        'observacion',
    ];

    protected $guarded = [];

    public function proyectos()
    {
        return $this->hasOne(Proyecto::class, 'idFase1Proyecto');
    }

    public function responsable_proyecto()
    {
        return $this->belongsTo(ResponsableProyecto::class, 'idResponsableProyecto', 'id');
    }

}
