<!--*********************** VISTA DE ADMINISTRACION *****************************-->

@extends('layouts.vistaAdmin')

@section('title','Administracion')

@section('menuLateral')

<div class="container-fluid" id="content">

  <section class="py-5">
      <div class="container">
      <h1 class="font-weight-bold mb-0" align="center">ADMINISTRADOR</h1>
      <h2 class="font-weight-bold mb-0"><i class="bi bi-grid-3x3-gap-fill"></i> TABLERO</h2>
        <p class="lead text-muted">Revisa el contenido</p>
  </section>


  <section class="page-content">
    <div class="tile-container">
      <a href="{{ route("empleados.index") }}" class="tile">
        <div class="tile-tittle">Registro empleado</div>
        <div class="tile-icon"><i class="bi bi-people-fill"></i></div>
      </a>

      <a href="{{ route("admin.create") }}" class="tile">
        <div class="tile-tittle">Registro Entidad</div>
        <div class="tile-icon"><i class="bi bi-building"></i></div>
      </a>
      {{-- <a href=# class="tile">
        <div class="tile-tittle">Control</div>
        <div class="tile-icon"><i class="bi bi-file-earmark-fill"></i></div>
      </a> --}}

    </div>

  </section>
</div>

@endsection
