<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='empleados';

    protected $primaryKey="id";

    protected $fillable =[
        'dpi',
        'nombre',
        'apellido',
        'fechadenacimiento',
        'telefono',
        'celular',
        'direccion',
        'salario',
        'sexo'
    ];

    protected $guarded =[

    ];
}
