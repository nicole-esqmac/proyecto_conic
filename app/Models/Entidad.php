<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='entidads';

    protected $primaryKey="id";

    protected $fillable =[
        'nit',
        'nombre_entidad',
        'direccion',
        'ciudad'
    ];

    protected $guarded =[

    ];
}
