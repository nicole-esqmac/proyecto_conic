<!--*********************** VISTA EDITAR PLAN CUENTAS *****************************-->

@extends('layouts.vistaAdmin')

@section('title','Plan Cuentas')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif

<!-- Content -->
    {{-- <div id="content"> --}}
      <div class="container">
          <section class="py-5">
            <h1 class="font-weight-bold mb-0" align="center">REGISTRO DE CUENTAS Y AUXILIARLES</h1>
            <p class="lead text-muted">Revisa el contenido</p>
          </section>

          <div class="container-fluid" class="block mb-8">
            <a href="{{ route('planCuentas.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i>&nbsp; Regresar</a>
        </div>

        <br>

  <br>
   <!-- MUESTRA LOS ERRORES DE LAS VALIDADCIONES -->
	@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
      <ul>
      @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>
      @endforeach
      </ul>
    </div>
    @endif



    <br>


 <!-- MENSAJE ALERTA EXITOSA -->
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
      </svg>

      <div class="row">
        <div class="col-sm-12">
          @if ($mensaje = Session::get('success'))
          <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
              {{ $mensaje}}
            </div>
          </div>
          @endif
        </div>
      </div>
  </section>


<!-- FORMULARIO EDITAR REGISTRO DE CUENTAS Y AUXILIARLES -->
<div class="container-fluid">
    <form action="{{ route('planCuentas.update', $planCuenta->id) }}" method="post" class="form-neon" autocomplete="off">
        @csrf
        @method('PUT')
        <fieldset class="form-neon">
        <legend><i class="bi bi-file-plus-fill"></i>&nbsp; Registro Beneficiario</legend>
            <div class="container-fluid">
                <div class="row">
                    {{-- SELCT OPTION DINAMICO --}}

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="idClaseCuenta">ID CLASE CUENTA</label>
                            <div class="search_select_box">
                                <select id="idClaseCuenta" name="idClaseCuenta" class="w-100" data-live-search="true">
                                    <option selected disabled>Seleccione una opción</option>
                                    @forelse ($claseCuentas as $claseCuenta)
                                        <option value="{{ $claseCuenta->id }}" @if ($claseCuenta->id == old('idClaseCuenta', $planCuenta->idClaseCuenta)) selected @endif>
                                            {{ $claseCuenta->codigo_cuenta}} {{ $claseCuenta->nombre_cuenta }}
                                        </option>
                                    @empty
                                        <p>No hay registro</p>
                                    @endforelse
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                          <label for="idClaseCuenta">ID GRUPO CUENTA</label>
                            <div class="search_select_box">
                                <select id="idGrupoCuenta" name="idGrupoCuenta" class="w-100" data-live-search="true">
                                    <option  selected disabled>Seleccione una opción</option>
                                        @forelse ($grupoCuentas as $grupoCuenta)
                                            <option value="{{ $grupoCuenta->id }}" @if ($grupoCuenta->id == old('idGrupoCuenta', $planCuenta->idGrupoCuenta)) selected @endif>
                                                {{ $grupoCuenta->codigo_cuenta}} {{ $grupoCuenta->nombre_cuenta }}
                                            </option>
                                        @empty
                                        <p>No hay registro</p>
                                        @endforelse
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                          <label for="idEstadoFinanciero">ID ESTADO FINANCIERO</label>
                            <div class="search_select_box">
                                <select id="idEstadoFinanciero" name="idEstadoFinanciero" class="w-100" data-live-search="true">
                                    <option  selected disabled>Seleccione una opción</option>
                                        @forelse ($estadoFinancieros as $estadoFinanciero)
                                            <option value="{{ $estadoFinanciero->id }}" @if ($estadoFinanciero->id == old('idEstadoFinanciero', $planCuenta->idEstadoFinanciero)) selected @endif>
                                                {{ $estadoFinanciero->estadoFinanciero}}
                                            </option>
                                        @empty
                                        <p>No hay registro</p>
                                        @endforelse
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="codigo_pc">Codigo cuenta</label>
                            <input type="text" name="codigo_pc" id="codigo_pc" inputmode="numeric" pattern="[0-9]+" class="form-control" placeholder="solo números positivos" value="{{ $planCuenta->codigo_pc }}">
                        </div>
                    </div>


                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="cuenta_pc">Nombre cuenta</label>
                            <input type="text" name="cuenta_pc" id="cuenta_pc" class="form-control" oninput="this.value = this.value.toUpperCase();" value="{{ $planCuenta->cuenta_pc }}">
                        </div>
                    </div>





</fieldset>



<br><br>


<fieldset class="form-neon" id="guardar">
    <h2>DATOS BENEFICIARIO</h2>
    <table class="table table-bordered" id="table">
        <tr>
            <th>CODIGO AUXILIAR</th>
            <th>NOMBRE AUXILIAR</th>
        </tr>

        @foreach ($detallePlanCuentas as $detalle)
            <tr>
                <td>
                    <input type="text" name="inputs[{{ $detalle->id }}][codigo]" value="{{ old('inputs.' . $detalle->id . '.codigo', $detalle->codigo) }}" class="form-control" placeholder="codigo">
                    <small id="codigo-error" class="text-danger"></small>
                </td>
                <td>
                    <input type="text" name="inputs[{{ $detalle->id }}][cuenta]" value="{{ old('inputs.' . $detalle->id . '.cuenta', $detalle->cuenta) }}" class="form-control" placeholder="cuenta">
                </td>
            </tr>
            @endforeach
    </table>



    {{-- BOTON GUARDAR--}}
        <div class="container-fluid">
          <ul class="full-box list-unstyled page-nav-tabs">
            <div class="d-grid gap-2 d-md-block">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-square-fill"></i>&nbsp;Guardar</button>
            </div>
          </ul>
        </div>

</fieldset>




    </form>


</section>

  </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


<script>
    // const codigoInput = document.querySelector('input[name^="inputs["][name$="][codigo]"]');
    // const codigoError = document.getElementById('dpi-error');

    // codigoInput.addEventListener('input', function () {
    //     const dpiValue = this.value;
    //     if (/^\d{13}$/.test(dpiValue)) {
    //         codigoError.textContent = '';
    //     } else {
    //         codigoError.textContent = 'El DPI debe contener exactamente 13 dígitos.';
    //     }
    // });
</script>




@endsection



