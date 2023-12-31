<?php

namespace App\Http\Controllers;

use App\Models\ClaseCuenta;
use App\Models\DetallePlanCuentaAuxiliar;
use App\Models\EstadoFinanciero;
use App\Models\GrupoCuenta;
use App\Models\PlanCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class PlanCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');


        $planCuentas = PlanCuenta::all();
        $detallePlanCuentas = DetallePlanCuentaAuxiliar::all();

        return view('planCuentas.index', compact( 'planCuentas','detallePlanCuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $claseCuentas=ClaseCuenta::all();

        $grupoCuentas=GrupoCuenta::all();

        $estadoFinanciero=EstadoFinanciero::all();

        return view('planCuentas.create', compact('claseCuentas', 'grupoCuentas', 'estadoFinanciero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $request->validate([
            'codigo_pc' => [
                'required',
                Rule::unique('plan_cuentas', 'codigo_pc'),
            ],
            'idClaseCuenta' => 'required',
            'idGrupoCuenta' => 'required',
            'idEstadoFinanciero' => 'required',
            'cuenta_pc' => 'required',
        ], [

            'idClaseCuenta.required' => 'El campo id de la clase de cuenta es requerido',
            'idGrupoCuenta.required' => 'El campo id del grupo de cuenta es requerido',
            'idEstadoFinanciero.required' => 'El campo id del estado financiero es requerido',
            'codigo_pc.required' => 'El campo codigo cuenta es requerido',
            'codigo_pc.unique' => 'El campo código cuenta ya está en uso',
            'cuenta_pc.required' => 'El campo nombre cuenta es requerido',
        ]);

        $planCuenta = new PlanCuenta();
        $planCuenta->idClaseCuenta = $request->get('idClaseCuenta');
        $planCuenta->idGrupoCuenta = $request->get('idGrupoCuenta');
        $planCuenta->idEstadoFinanciero = $request->get('idEstadoFinanciero');
        $planCuenta->codigo_pc = $request->get('codigo_pc');
        $planCuenta->cuenta_pc = $request->get('cuenta_pc');
        $planCuenta->save();

        // Verificar la opción seleccionada
        $opcion = $request->get('selectAuxiliar');

        if ($opcion == 1) {
            if ($request->has('inputs')) {
                $idPlanCuentas = $planCuenta;

                $reglas = [
                    'inputs.*.codigo' => 'required|unique:detalle_plan_cuenta_auxiliars,codigo',
                    'inputs.*.cuenta' => 'required',
                ];

                $validacion = [
                    'inputs.*.codigo' => 'El campo codigo auxiliar es requerido',
                    'inputs.*.cuenta' => 'El campo cuenta auxiliar es requerida',
                ];

                $request->validate($reglas, $validacion);

                foreach ($request->inputs as $key => $value) {
                    DetallePlanCuentaAuxiliar::create([
                        'idPlanCuentas' => $idPlanCuentas->id,
                        'codigo' => $value['codigo'],
                        'cuenta' => $value['cuenta'],
                    ]);
                }
            }
        }

        return back()->with('success', 'Agregado a la tabla');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanCuenta  $planCuenta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $planCuentas=PlanCuenta::select('plan_cuentas.id', 'plan_cuentas.idClaseCuenta','plan_cuentas.idGrupoCuenta','plan_cuentas.idEstadoFinanciero','plan_cuentas.codigo_pc','plan_cuentas.cuenta_pc')
        ->where('plan_cuentas.id', '=', $id)
        ->first();//PARA OBTENER EL PRIMER INGRESO QUE SE CUMPLA CON RESPECTO AL WHERE

        $detallePlanCuentas=DetallePlanCuentaAuxiliar::select('detalle_plan_cuenta_auxiliars.id', 'detalle_plan_cuenta_auxiliars.codigo','detalle_plan_cuenta_auxiliars.cuenta')
        ->where('detalle_plan_cuenta_auxiliars.idPlanCuentas', '=', $id)
        ->get();

        return view('planCuentas.show', compact( 'planCuentas','detallePlanCuentas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanCuenta  $planCuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanCuenta $planCuenta)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        // Obtén datos relacionados
        $claseCuentas = ClaseCuenta::all();
        $grupoCuentas = GrupoCuenta::all();
        $estadoFinancieros = EstadoFinanciero::all();


        $planCuentas = PlanCuenta::all();

        // Obtiene los detalles de detalle_plan_cuenta_auxiliars relacionados con el $planCuentas
        $detallePlanCuentas = DetallePlanCuentaAuxiliar::where('idPlanCuentas', $planCuenta->id)->get();

        return view('planCuentas.edit', compact('claseCuentas', 'grupoCuentas', 'estadoFinancieros',  'planCuentas', 'detallePlanCuentas', 'planCuenta'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanCuenta  $planCuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanCuenta $planCuenta)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        // Valida y actualiza los datos de Fase2Proyecto
        $request->validate([
            'idClaseCuenta'     => 'required',
            'idGrupoCuenta'     => 'required',
            'idEstadoFinanciero'=> 'required',
            'codigo_pc'          => 'required',
            'cuenta_pc'          => 'required',
        ]);

        $planCuenta->update([
            'idClaseCuenta'     => $request->input('idClaseCuenta'),
            'idGrupoCuenta'     => $request->input('idGrupoCuenta'),
            'idEstadoFinanciero'=> $request->input('idEstadoFinanciero'),
            'codigo_pc'          => $request->input('codigo_pc'),
            'cuenta_pc'          => $request->input('cuenta_pc'),
        ]);

        $inputs = $request->input('inputs');

    foreach ($inputs as $id => $input) {
        $detalle = DetallePlanCuentaAuxiliar::find($id);

        if ($detalle) {
            $detalle->update([
                'codigo' => $input['codigo'],
                'cuenta' => $input['cuenta'],
            ]);
        }
    }

        return redirect()->route('planCuentas.index')
            ->with("success", "Actualizado con éxito!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanCuenta  $planCuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanCuenta $planCuenta)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
    }
}
