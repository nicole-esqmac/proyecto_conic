<?php

namespace App\Http\Controllers;

use App\Models\DetalleFase2Proyecto;
use App\Models\Fase2Proyecto;
use App\Models\ResponsableProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class Fase2ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $fase2Proyectos = Fase2Proyecto::all();
        return view('fase2Proyectos.index', compact('fase2Proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $responsableProyecto = ResponsableProyecto::all();
        return view('fase2Proyectos.create', compact('responsableProyecto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $request->validate([
                'idResponsableProyecto' => 'required',
                'observacion' => 'required',
                'inputs.*.dpi' => 'required|min:13|max:13|unique:detalle_fase2_proyectos,dpi',
                'inputs.*.nombre' => 'required',
                'inputs.*.apellido' => 'required',
                'inputs.*.direccion' => 'required',
            ], [
                'idResponsableProyecto' => 'El campo ID RESPONSABLE PROYECTO es requerido',
                'observacion' => 'El campo Observaciones es requerido',
                'inputs.*.dpi' => 'El campo DPI es requerido y debe de llevar 13 digitos',
                'inputs.*.nombre' => 'El campo nombre es requerida',
                'inputs.*.apellido' => 'El campo apellido es requerida',
                'inputs.*.direccion' => 'El campo direccion es requerida',
            ]);

            $fase2Proyectos = new Fase2Proyecto();
            $fase2Proyectos->idResponsableProyecto = $request->get('idResponsableProyecto');
            $fase2Proyectos->observacion = $request->get('observacion');
            $fase2Proyectos->save();


            if ($request->has('inputs')) {
                $idFase2Proyectos = $fase2Proyectos;

                foreach ($request->inputs as $key => $value) {
                    DetalleFase2Proyecto::create([
                        'idFase2Proyectos' => $idFase2Proyectos->id,
                        'dpi' => $value['dpi'],
                        'nombre' => $value['nombre'],
                        'apellido' => $value['apellido'],
                        'direccion' => $value['direccion'],
                    ]);
                }
            }


        return redirect()->route("fase2Proyectos.index")->with('success', 'Agregado a la tabla');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fase2Proyecto  $fase2Proyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fase2Proyecto=Fase2Proyecto::select('fase2_proyectos.id', 'fase2_proyectos.idResponsableProyecto','fase2_proyectos.observacion')
        ->where('fase2_proyectos.id', '=', $id)
        ->first();//PARA OBTENER EL PRIMER INGRESO QUE SE CUMPLA CON RESPECTO AL WHERE

        $detalleFase2Proyecto=DetalleFase2Proyecto::select('detalle_fase2_proyectos.id', 'detalle_fase2_proyectos.dpi','detalle_fase2_proyectos.nombre', 'detalle_fase2_proyectos.apellido', 'detalle_fase2_proyectos.direccion')
        ->where('detalle_fase2_proyectos.idFase2Proyectos', '=', $id)
        ->get();

        return view('fase2Proyectos.show', compact('fase2Proyecto', 'detalleFase2Proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fase2Proyecto  $fase2Proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Fase2Proyecto $fase2Proyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $responsableProyecto = ResponsableProyecto::all();

    // Obtiene los detalles de fase2_proyectos relacionados con el $fase2Proyecto
    $detalleFase2Proyecto = DetalleFase2Proyecto::where('idFase2Proyectos', $fase2Proyecto->id)->get();

    return view('fase2Proyectos.edit', compact('responsableProyecto', 'detalleFase2Proyecto', 'fase2Proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fase2Proyecto  $fase2Proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fase2Proyecto $fase2Proyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Valida y actualiza los datos de Fase2Proyecto
        $request->validate([
            'idResponsableProyecto' => 'required',
            'observacion' => 'required',
        ]);

        $fase2Proyecto->update([
            'idResponsableProyecto' => $request->input('idResponsableProyecto'),
            'observacion' => $request->input('observacion'),
        ]);

        $inputs = $request->input('inputs');

        foreach ($inputs as $id => $input) {
            $detalle = DetalleFase2Proyecto::find($id);

            if ($detalle) {
                $detalle->update([
                    'dpi' => $input['dpi'],
                    'nombre' => $input['nombre'],
                    'apellido' => $input['apellido'],
                    'direccion' => $input['direccion'],
                ]);
            }
        }

        return redirect()->route('fase2Proyectos.index')
            ->with("success", "Actualizado con éxito!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fase2Proyecto  $fase2Proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fase2Proyecto $fase2Proyecto)
    {
        abort_if(Gate::denies('proyectos_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
}
