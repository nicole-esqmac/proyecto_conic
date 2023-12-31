<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LibroDiario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='libro_diarios';

    protected $primaryKey="id";

    protected $fillable =[
        'fecha_hora',
        'idEntidad',
        'descripcion',
        'total',
        'estado'
    ];

    protected $guarded =[

    ];

    //RELACION UNO A MUCHOS
    public function detalleLibroDiario()
    {
        return $this->hasMany(DetalleLibroDiario::class, 'id');
    }

    public function libroDiarioEntidad()// nombre de la funcion
    {
        //Aquí se declaran el nombre modelo y llamar a sus atribbutos
        return $this->hasOne(Entidad::class, 'id', 'idEntidad');
    }
}
