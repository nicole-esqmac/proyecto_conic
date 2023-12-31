<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProyectosRequest;
use App\Http\Requests\UpdateProyectosRequest;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $proyectos = Proyecto::all();

        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProyectosRequest $request)
    {
        Proyecto::create($request->validated());

        return redirect()->route('proyectos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('proyectos.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProyectosRequest $request, Proyecto $proyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');



        $proyecto->update($request->validated());

        return redirect()->route('proyectos.index')
        ->with("success", "Actualizado con éxito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    }

    public function fasesProyectos()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('fasesProyectos.index');


    }
}
