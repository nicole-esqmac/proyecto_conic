<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateResponsableProyectoRequest;
use App\Models\Proyecto;
use App\Models\ResponsableProyecto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ResponsableProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $responsableProyectos=ResponsableProyecto::all();

        return view('responsableProyectos.index', compact('responsableProyectos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //
        $responsable_proyectos = Proyecto::select("*", DB::raw("CONCAT(proyectos.id, ' ',proyectos.descripcion) as idProyecto"))//SIRVE PARA CONCATENAR
          ->get();//OBTIENE LOS DATOS

        $proyectos = Proyecto::all();
        return view('responsableProyectos.create', compact('responsable_proyectos','proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //SIRVE PARA GUARDAR EN LA BASE DE DATOS
        $responsableProyecto = new ResponsableProyecto();
        $responsableProyecto->idProyecto=$request->get('idProyecto');
        $responsableProyecto->tipoDocumento=$request->get('tipoDocumento');
        $responsableProyecto->documento=$request->get('documento');
        $responsableProyecto->nombre=$request->get('nombre');
        $responsableProyecto->apellido=$request->get('apellido');
        $responsableProyecto->edad=$request->get('edad');
        $responsableProyecto->sexo=$request->get('sexo');
        $responsableProyecto->telefono=$request->get('telefono');
        $responsableProyecto->celular=$request->get('celular');
        $responsableProyecto->estado=$request->get('estado');
        $mytime=Carbon::now('America/Guatemala');
        $responsableProyecto->fecha_hora=$mytime->toDateTimeString();
        $responsableProyecto->direccion=$request->get('direccion');
        $responsableProyecto->observacion=$request->get('observacion');
        $responsableProyecto->save();


        //SE HACE UNA REDIRECCION
       return redirect()->route("responsableProyectos.index")->with("success", "Agregado con éxito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResponsableProyecto  $responsableProyecto
     * @return \Illuminate\Http\Response
     */
    public function show(ResponsableProyecto $responsableProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        return view('responsableProyectos.show', compact('responsableProyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponsableProyecto  $responsableProyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponsableProyecto $responsableProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $manejo_proyectos = Proyecto::all();
        return view('responsableProyectos.edit', compact('responsableProyecto', 'manejo_proyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponsableProyecto  $responsableProyecto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResponsableProyectoRequest $request, ResponsableProyecto $responsableProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $responsableProyecto->update($request->validated());

        return redirect()->route('responsableProyectos.index')
        ->with("success", "Actualizado con éxito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponsableProyecto  $responsableProyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponsableProyecto $responsableProyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
    }
}
