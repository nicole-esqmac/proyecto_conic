<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BancoFase1Proyecto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='banco_fase1_proyectos';

    protected $primaryKey="id";

    protected $fillable = [
        'nombre_banco'
    ];

    protected $guarded =[

    ];
}
