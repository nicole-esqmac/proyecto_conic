<!--*********************** VISTA MOSTAR SALDO INICIAL *****************************-->

@extends('layouts.vistaAdmin')

@section('title','Saldo Inicial')

@section('menuLateral')


<!-- CONTENIDO-->
      <div class="container">
          <section class="py-5">
            <h2 class="font-weight-bold mb-0"><i class="bi bi-file-earmark-text-fill"></i>&nbsp; Detalle Saldo Inicial</h2>
            <p class="lead text-muted">Revisa el contenido</p>
          </section>


          <div class="container-fluid" class="block mb-8">
            <a href="{{ route('saldoInicial.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i>&nbsp; Regresar</a>
        </div>

        <br>



     <!-- TABLA DE CONTENIDO -->
     <div class="container-fluid">
        <br>

        <fieldset  autocomplete="off">
            {{-- <legend class="form-neon"><i class="bi bi-journal-text"></i>&nbsp; Detalle libro diario</legend> --}}
            <br>

            <br>

            <div class="card">
            <div class="card-body" style="background: #F0F0F0">
            <div class="container-fluid">
                {{-- 1ra fila --}}

                <div class="row" >

                    <div class="col-12 col-md-4" >
                        <div class="form-group">
                            <label style="font-weight: 600; font-size: 20px" for="fecha">Fecha</label>
                            <p>{{$saldoInicial->fecha_registro}}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label style="font-weight: 600; font-size: 20px" for="comprobante">Entidad</label>
                            <p>{{$saldoInicial->saldoInicialEntidad->nombre_entidad}}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label style=" font-weight: 600; font-size:20px" for="descripcion">Descripcion</label>
                            <p>{{$saldoInicial->descripcion}}</p>
                        </div>
                    </div>

                </div>

                <br>

            </div>
        </div>
        </div>
        </fieldset>



      <section>

        <BR>

        {{-- TABLAS 2 --}}
        <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead class="table-dark" class="cabecera-tabla">
                    <th>CUENTA CONTABLE</th>
                    <th>DEBITO</th>
                    <th>CREDITO</th>
                </thead>
                <tfoot class="tbody">
                    <th style="font-size: 20px">TOTAL</th>
                    <th style="font-size: 20px" id="totalDebitosLD">Q {{$saldoInicial->total}}</th>
                    <th style="font-size: 20px" id="totalCreditosLD">Q {{$saldoInicial->total}}</th>
                </tfoot>
                <tbody>
                    @foreach ($detallesSI as $dato)

                        <tr>
                            <td>{{ $dato->codigo}} {{ $dato->cuenta}}</td>
                            <td>{{ $dato->debitosSI}}</td>
                            <td>{{ $dato->creditosSI}}</td>

                        </tr>

                    @endforeach
                </tbody>
            </table>
          </div>

        </div>
    </div>

      </section>
  </div>
</div>
</div>

@endsection

