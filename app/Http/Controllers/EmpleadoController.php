<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class EmpleadoController extends Controller
{
    /**
     * Se muestra la pagina de index donde se puede observar el registro de las tablas
     * con los botones de ver, editar e eliminar
     * asimismo con el boton agregar empleado
     */
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $empleado = Empleado:: all();

        // SIRVE PARA OBSERVAR LOS DATOS EN LA VISTA
        return view('empleados.index', compact('empleado'));
    }

    /**
     * Muestra el formulario de crear o registrar empleados
     *
     */
    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        return view('empleados.create');
    }

    /**
     *Se utilizada para almacenar datos enviados a través de
     *un formulario en la base de datos
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'dpi' => 'required|string|max:13',
            'nombre' => 'required',
            'apellido' => 'required',
            'fechadenacimiento' => 'required',
            'telefono' => 'required|string|max:8',
            'celular' => 'required|string|max:8',
            'direccion' => 'required',
            'salario' => 'required',
            'sexo' => 'required',
        ]);


        $existeEmpleado = Empleado::where('dpi', $request->dpi)
            ->orWhere('telefono', $request->telefono)
            ->orWhere('celular', $request->celular)
            ->first();

        if ($existeEmpleado) {
            return redirect()->route('empleados.index')
                ->with('error', 'Ya existe un empleado con el mismo DPI, teléfono o celular.');
        }

        // Si no existe un empleado con los mismos valores, se crea un nuevo registro
        Empleado::create($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Agregado con éxito!');
    }

    /**
     * Muestra los valores registrados en la fuccion de create
     */
    public function show(Empleado $empleado)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        return view('empleados.show', compact('empleado'));
    }

    /**
     * Muestra los datos para editar
     */
    public function edit($id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //SIRVE PARA TRAER LOS DATOS QUE SE VAN A EDITAR
        // Y LOS COLOCA EN UN FORMULARIO
        $empleados = Empleado::find($id);
        return view('empleados.edit' , compact('empleados'));
    }

    /**
     * Actualizar los datos especificos.
     */
    public function update(Request $request, $id)
    {
        //ACTUALIZA LOS DATOS EN LA BASE DE DATOS
        $empleado = Empleado::find($id);
        $empleado->dpi = $request->post('dpi');
        $empleado->nombre = $request->post('nombre');
        $empleado->apellido = $request->post('apellido');
        $empleado->fechadenacimiento = $request->post('fechadenacimiento');
        $empleado->telefono = $request->post('telefono');
        $empleado->celular = $request->post('celular');
        $empleado->salario = $request->post('salario');
        $empleado->sexo = $request->post('sexo');
        $empleado->save();


        return redirect()->route("empleados.index")//SE HACE UNA REDIRECCION
        ->with("success", "Actualizado con éxito!");//SIRVE PARA AGREGAR UN SUCESO = MENSAJE
    }

    /**
     * Elimina un registro wn la base de datos.
     */
    public function destroy(Empleado $empleado)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //ELIMINA UN REGISTRO
        $empleado->delete();

        return redirect()->route("empleados.index")//SE HACE UNA REDIRECCION
        ->with("success", "Eliminado con éxito!");//SIRVE PARA AGREGAR UN SUCESO = MENSAJE
    }
}
