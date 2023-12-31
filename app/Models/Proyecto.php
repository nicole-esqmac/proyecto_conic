<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='proyectos';

    protected $primaryKey="id";

    protected $fillable = [
        'titulo',
        'descripcion'
    ];

    protected $guarded =[

    ];
}
