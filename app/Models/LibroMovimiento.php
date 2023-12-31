<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LibroMovimiento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='libro_movimientos';

    protected $primaryKey='id';

    protected $fillable =[
        'numero_actual'
    ];

    protected $guarded =[

    ];
}
