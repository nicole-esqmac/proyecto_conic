<?php

namespace App\Http\Controllers;

use App\Models\DetalleLibroDiario;
use App\Models\DetalleLibroMovimiento;
use App\Models\PlanCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ContadorController extends Controller
{
    //

    public function libroMovimientos()
    {

        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $detalleLibroMovimientos = DetalleLibroMovimiento::all();

        return view('libroMovimientos.index', compact('detalleLibroMovimientos'));

    }

    public function libroMayor()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $detalle_libro_diario = DetalleLibroDiario::all();

        return view('libroMayor.index', compact('detalle_libro_diario'));
    }

    public function balanceGeneral()
    {
        abort_if(Gate::denies('contador_access'), Response::HTTP_FORBIDDEN, '403 ACCESO DENEGADO');

        $planCuentas = PlanCuenta::all();
        return view('balanceGeneral.index', compact( 'planCuentas'));
    }
}
