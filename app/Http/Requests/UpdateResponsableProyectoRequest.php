<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResponsableProyectoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'idProyecto'    => 'required',
            'tipoDocumento' => 'required',
            'documento'     => 'required',
            'nombre'        => 'required',
            'apellido'      => 'required',
            'edad'          => 'required',
            'sexo'          => 'required',
            'telefono'      => 'required',
            'celular'       => 'required',
            'estado'        => 'required',
            'direccion'     => 'required',
            'observacion'   => 'required'
        ];
    }
}
