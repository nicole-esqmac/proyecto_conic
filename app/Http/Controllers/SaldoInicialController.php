<?php

namespace App\Http\Controllers;

use App\Models\DetalleLibroMovimiento;
use App\Models\DetalleSaldoInicial;
use App\Models\Entidad;
use App\Models\LibroMovimiento;
use App\Models\PlanCuenta;
use App\Models\SaldoInicial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SaldoInicialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $saldoInicial = SaldoInicial::all();
        return view('saldoInicial.index', compact('saldoInicial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        // Se obtiene el número actual desde la base de datos
        $numeroActual = DB::table('libro_movimientos')->value('numero_actual');

        // Incrementa el número actual para la próxima vez
        $numeroSiguiente = $numeroActual + 1;

        $entidads = Entidad::all();


        $planCuentas = PlanCuenta::select("*", DB::raw("CONCAT(plan_cuentas.codigo_pc, ' ',  plan_cuentas.cuenta_pc) as cuenta_contable"))//SIRVE PARA CONCATENAR
         ->get();//OBTIENE LOS DATOS


        return view('saldoInicial.create',compact('numeroSiguiente','entidads', 'planCuentas'));
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

            //VALIDACION
            $request->validate([

                'fecha_registro'    => 'required',
                'idEntidad'         => 'required',
                'descripcion'       => 'required',
                'codigo'            => 'required',
                'cuenta'            => 'required',
            ],

            [
                'fecha_registro.required'   => 'El campo Fecha de registro es requerido',
                'idEntidad.required'        => 'El campo ID ENTIDAD es requerido',
                'descripcion.required'      => 'El campo Descripción es requerido',
                'codigo.required'           => 'El campo codigo es requerido',
                'cuenta.required'           => 'El campo cuenta es requerido',
            ]);

            $sumaTotalDebitos = 0; // variable que almacena la suma total de débitos
            $sumaTotalCreditos = 0; // variable que almacena la suma total de créditos

            // Se Obtiene los valores de entrada del formulario
            $codigo = $request->input('codigo');
            $cuenta = $request->input('cuenta');
            $debitosSI = $request->input('debitosSI');
            $creditosSI = $request->input('creditosSI');
            $numeroActual     = $request->get('numero_actual');

            // Calcular la suma total de débitos y créditos
            $sumaTotalDebitos = array_sum($debitosSI);
            $sumaTotalCreditos = array_sum($creditosSI);

            // Guardar el registro principal en la base de datos
            $saldoInicial = new SaldoInicial();
            $saldoInicial->fecha_registro   = $request->input('fecha_registro');
            $saldoInicial->idEntidad        = $request->input('idEntidad');
            $saldoInicial->descripcion      = $request->input('descripcion');
            $saldoInicial->total            = $sumaTotalDebitos;
            $saldoInicial->estado           = 'ACTIVO';
            $saldoInicial->save();

            // Guardar un nuevo registro en la tabla libro_cuenta_auxiliares
            $libroMovimientos = new LibroMovimiento();
            $libroMovimientos->numero_actual = $numeroActual; // Asigna el valor de numero_actual
            $libroMovimientos->save();

            // Incrementa el número actual para la próxima vez en la base de datos
            DB::table('libro_movimientos')->update(['numero_actual' => $numeroActual + 1]);

            // Crea un array para almacenar los detalles
            $detalles = [];
            $detalles2 = [];

            // Obtener el modelo de saldoInicial recién creado
            $saldoInicial = $saldoInicial;
            $libroMovimiento = $libroMovimientos;

            // Recorre los datos de entrada para construir el array de detalles
            foreach ($codigo as $index => $codigoItem) {
                $detalle = [
                    'idSaldoInicial' => $saldoInicial->id,
                    'codigo' => $codigoItem,
                    'cuenta' => $cuenta[$index],
                    'debitosSI' => $debitosSI[$index],
                    'creditosSI' => $creditosSI[$index],
                    'totalDebitosSI' => $sumaTotalDebitos,
                    'totalCreditosSI' => $sumaTotalCreditos,
                ];

                // Calcular el total de débitos y créditos mientras se construye el array
                $sumaTotalDebitos += $detalle['debitosSI'];
                $sumaTotalCreditos += $detalle['creditosSI'];

                $detalles[] = $detalle;
            }

            // Guardar los detalles en la base de datos
            DetalleSaldoInicial::insert($detalles);



            // Recorrer los datos de entrada y construir el array de detalles
            foreach ($codigo as $index2 => $codigoItem2) {
                $detalle2 = [
                    'idLibroMovimiento' => $libroMovimiento->id,
                    'codigo' => $codigoItem2,
                    'cuenta' => $cuenta[$index2],
                    'debitosLD'=>"",
                    'creditosLD'=>"",
                    'debitosSI' => $debitosSI[$index2],
                    'creditosSI' => $creditosSI[$index2],
                ];


                $detalles2[] = $detalle2;
            }

            // Guardar los detalles en la base de datos
            DetalleLibroMovimiento::insert($detalles2);



    // Redireccionar a la página de índice con un mensaje de éxito
    return redirect()->route("saldoInicial.index")->with("success", "Agregado con éxito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaldoInicial  $saldoInicial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $saldoInicial=SaldoInicial::select('saldo_inicials.fecha_registro','saldo_inicials.idEntidad','saldo_inicials.descripcion','saldo_inicials.total')
        ->where('saldo_inicials.id', '=', $id)
        ->first();//PARA OBTENER EL PRIMER INGRESO QUE SE CUMPLA CON RESPECTO AL WHERE

        $detallesSI=DetalleSaldoInicial::select('detalle_saldo_inicials.codigo','detalle_saldo_inicials.cuenta', 'detalle_saldo_inicials.debitosSI', 'detalle_saldo_inicials.creditosSI','detalle_saldo_inicials.totalDebitosSI','detalle_saldo_inicials.totalCreditosSI')
        ->where('detalle_saldo_inicials.idSaldoInicial', '=', $id)
        ->get();

        return view('saldoInicial.show', compact('saldoInicial','detallesSI'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaldoInicial  $saldoInicial
     * @return \Illuminate\Http\Response
     */
    public function edit(SaldoInicial $saldoInicial)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaldoInicial  $saldoInicial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaldoInicial $saldoInicial)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaldoInicial  $saldoInicial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        //CANCELA UN REGISTRO
        $saldoInicial=SaldoInicial::findOrFail($id);
        $saldoInicial->estado='CANCELADO';
        $saldoInicial->update();
        //SE HACE UNA REDIRECCION
        return redirect()->route('saldoInicial.index')->with("success", "Cancelado con éxito!");

    }
}
