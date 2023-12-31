<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fase2Proyecto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'fase2_proyectos';

    protected $primaryKey = "id";

    protected $fillable = [
        'idResponsableProyecto',
        'observacion'
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
