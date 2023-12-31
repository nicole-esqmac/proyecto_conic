<!--*********************** VISTA INDEX FASES DE PROYECTOS *****************************-->

@extends('layouts.vistaProyecto')

@section('title','Fase1 Proyecto')

@section('menuLateral')

<div class="container-fluid" id="content">

  <section class="py-5">
      <div class="container">
      <h1 class="font-weight-bold mb-0" align="center">FASES PROYECTO</h1>
      <h2 class="font-weight-bold mb-0"><i class="bi bi-grid-3x3-gap-fill"></i> TABLERO</h2>
        <p class="lead text-muted">Revisa el contenido</p>
  </section>


  <section class="page-content">
    <div class="tile-container">
      <a href="{{ route("fase1Proyectos.index") }}" class="tile">
        <div class="tile-tittle">Fase 1 Monto/Aporte</div>
        <div class="tile-icon"><i class="bi bi-cash-coin"></i></i></div>
      </a>
      <a href="{{ route("fase2Proyectos.index") }}" class="tile">
        <div class="tile-tittle">Fase 2 Beneficiario</div>
        <div class="tile-icon"><i class="bi bi-people-fill"></i></div>
      </a>
      {{-- <a href=# class="tile">
        <div class="tile-tittle">Fase 3 Carta Garantia</div>
        <div class="tile-icon"><i class="bi bi-file-text-fill"></i></div>
      </a> --}}

    </div>

  </section>
</div>

@endsection
