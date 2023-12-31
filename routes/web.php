<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\Fase1ProyectoController;
use App\Http\Controllers\Fase2ProyectoController;
use App\Http\Controllers\LibroDiarioController;
use App\Http\Controllers\PlanCuentaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ResponsableProyectoController;
use App\Http\Controllers\SaldoInicialController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth'])->group(function () {
    // SE COLOCA LAS RURAS PROTEGIDAS

    /*-----------------------RUTA MODULO ADMINISTRACION------------------------------*/
    Route::resource('users',UserController::class);
    Route::resource('empleados',EmpleadoController::class);
    Route::resource('admin',AdministradorController::class);
    Route::get('/info', [AdministradorController::class,'info'])->name('admin.info');
    Route::resource('planCuentas', PlanCuentaController::class);
    Route::resource('saldoInicial', SaldoInicialController::class);
    Route::resource('libroDiario', LibroDiarioController::class);


    /*------------------------------RUTA MANEJO PROYECTO-----------------------------*/
    Route::resource('proyectos', ProyectoController::class);
    Route::get('/fasesProyectos', [ProyectoController::class,'fasesProyectos'])->name('proyectos.fasesProyectos');
    Route::resource('responsableProyectos', ResponsableProyectoController::class);
    Route::resource('fase1Proyectos', Fase1ProyectoController::class);
    Route::resource('fase2Proyectos', Fase2ProyectoController::class);


    /*-------------------------------RUTA MODULO CONTADOR--------------------------------------*/
    Route::get('/contador', [ContadorController::class,'contador'])->name('contador');
    Route::get('/libroMovimientos', [ContadorController::class,'libroMovimientos'])->name('libroMovimientos');
    Route::get('/libroMayor', [ContadorController::class,'libroMayor'])->name('libroMayor');
    Route::get('/balanceGeneral', [ContadorController::class,'balanceGeneral'])->name('balanceGeneral');


});


