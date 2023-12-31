<!--*********************** VISTA CREAR SALDO INICIAL *****************************-->

@extends('layouts.vistaAdmin')

@section('title','Saldo Inicial')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif

<!-- Content -->
      <div class="container">
          <section class="py-5">
            <h1 class="font-weight-bold mb-0" align="center">REGISTRO SALDO INICIAL</h1>
            <p class="lead text-muted">Revisa el contenido</p>
          </section>

          <div class="container-fluid" class="block mb-8">
            <a href="{{ route('saldoInicial.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i>&nbsp; Regresar</a>
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

<!-- FORMULARIO DE REGISTRO DE CUENTAS Y AUXILIARLES -->
<div class="container-fluid">

    <form action="{{ route("saldoInicial.store")}}" method="POST"   autocomplete="off">
        @csrf

        <div class="card">
            <div class="card-body" style="background: #b2bdb5e5">

        <fieldset>
            <legend><i class="bi bi-journal-text"></i>&nbsp; Agregar Saldo Inicial</legend>
            <div class="container-fluid">
                {{-- 1ra fila --}}
                <div class="row">

                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="fecha_registro">Fecha de registro</label>
                            <input type="date" name="fecha_registro" id="fecha_registro"
                            value="{{ old('fecha_registro') }}" class="form-control">
                        </div>
                    </div>

                    {{-- SELCT OPTION DINAMICO --}}
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="idEntidad">ID ENTIDAD</label>
                            <div class="search_select_box">
                                <select id="idEntidad" name="idEntidad"  data-live-search="true" class="w-100">
                                    <option  selected disabled>Seleccione una opción</option>
                                        @foreach ($entidads as $dato)
                                        <option value="{{$dato->id}}">{{$dato->id}} {{$dato->nombre_entidad}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') }}" class="form-control" oninput="this.value = this.value.toUpperCase()">
                        </div>
                    </div>


                    <div class="col-12 col-md-1">
                        <div class="form-group">
                            <label for="numero_actual">No</label>
                            <input type="text" name="numero_actual" id="numero_actual" value="{{ $numeroSiguiente }}" class="form-control" readonly>
                        </div>
                    </div>


                </div>

            </div>
        </fieldset>
    </div>
</div>

<br><br>


        <fieldset class="form-neon">
            {{-- 2da fila --}}
            <div class="row">
                {{-- FORMULARIO PARA AGREGAR  LOS DETALLES DE SALDO INICIAL --}}

                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="cuenta_contable">Cuenta contable</label>
                        <div class="search_select_box">
                            <select id="cuenta_contable" name="cuenta_contable" class="w-100" data-live-search="true">
                                <option selected disabled>Seleccione una opción</option>
                                @foreach ($planCuentas as $dato)
                                    <option value="{{$dato->id}}_{{$dato->codigo_pc}}_{{$dato->cuenta_pc}}">{{$dato->cuenta_contable}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>



                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="codigo_pc">Código</label>
                        <input disabled type="text" name="codigo_pc" id="codigo_pc" class="form-control" placeholder="código">
                    </div>
                </div>

                <div class="col-12 col-md-4">
                        <label for="cuenta_pc">Cuenta</label>
                        <input disabled type="text" name="cuenta_pc" id="cuenta_pc" class="form-control" placeholder="cuenta">
                </div>



                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="valor">Monto</label>
                        <input type="text" name="valor" id="valor" oninput="validarNumero(this)" class="form-control" placeholder="Introduce un valor">
                    </div>
                </div>

                <script>
                    function validarNumero(input) {
                        // Remueve cualquier carácter que no sea un número o un punto decimal
                        input.value = input.value.replace(/[^0-9.]/g, '');

                        // Verifica si ya hay un punto decimal y evita agregar más de uno
                        if (input.value.indexOf('.') !== -1) {
                            var decimalPart = input.value.split('.')[1];
                            if (decimalPart.length > 2) {
                                input.value = input.value.slice(0, -1);
                            }
                        }
                    }
                   </script>

                <div class="col-12 col-md-4">
                    <br>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="opcion" id="debitoSI" value="debitoSI">
                            <label class="form-check-label" for="debito">Débito</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="opcion" id="creditoSI" value="creditoSI">
                            <label class="form-check-label" for="credito">Crédito</label>
                        </div>

                    </div>
                </div>


            </div>
        </fieldset>




        {{-- BOTON DE AGREGAR --}}
        <fieldset class="form-neon">
            <div class="container-fluid">
              <ul class="full-box list-unstyled page-nav-tabs">
                <div class="d-grid gap-2 d-md-block">
                  <button id="agregar" type="button" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i>&nbsp; Agregar</button>
                </div>
              </ul>
            </div>
        </fieldset>

          <br>
          {{-- TABLAS 2 --}}
          <fieldset class="form-neon">

            <div class="table-responsive">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead class="table-dark" class="cabecera-tabla" >
                        {{-- <th>OPCIONES</th> --}}
                        <th>CODIGO</th>
                        <th>CUENTA</th>
                        <th>DEBITO</th>
                        <th>CREDITO</th>
                    </thead>
                    <tfoot class="tbody">
                        {{-- <th></th> --}}
                        <th></th>
                        <th style="font-size: 20px">TOTAL</th>
                        <th style="font-size: 20px" id="totalDebitosSI">Q/. 0.00</th>
                        <th style="font-size: 20px" id="totalCreditosSI">Q/. 0.00</th>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>

          </fieldset>


        <br>

        {{--BOTONES --}}
        <fieldset>
            <div class="container-fluid" id="guardar">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <div class="d-grid gap-2 d-md-block" type="hidden">
                        <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                        <button class="btn btn-primary" type="submit"><i class="bi bi-save-fill"></i>&nbsp; Guardar</button>
                        <button class="btn btn-danger" id="recargarPagina"><i class="bi bi-x-square-fill"></i>&nbsp; Cancelar</button>

                        <script>
                        document.getElementById("recargarPagina").addEventListener("click", function() {
                            location.reload(); // Esto recargará la página
                        });
                        </script>

                    </div>
                </ul>
            </div>
        </fieldset>


    <br>




</section>
</form>


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

<br>


</section>



  </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@push('scripts')

<script>
 $(document).ready(function() {
    $("#agregar").click(function() {
        agregar();
    });
});

let cont = 0;
let i = 0;
let totalDebito = 0;
let totalCredito = 0;
let subTotalDebito = [];
let subTotalCredito = [];



$("#guardar").hide();
$("#cuenta_contable").change(mostrarValores);

function mostrarValores() {
    const datos = document.getElementById('cuenta_contable').value.split('_');
    $("#cuenta_pc").val(datos[2]);
    $("#codigo_pc").val(datos[1]);
}

function agregar() {
    codigo = $('#codigo_pc').val();
    cuenta = $('#cuenta_pc').val();
    valor = parseFloat($('#valor').val()); // Convertir el valor a un número


    // Captura la opción seleccionada (Débito o Crédito)
    let opcionSeleccionada = $("input[name='opcion']:checked").val();

    if (codigo != "" && cuenta != "" && valor>0 && !isNaN(valor) && opcionSeleccionada) {

        //Construccion de filas
        // <td><button type="button" class="btn btn-warning" onclick="eliminar(${cont});">X</button></td>

        let fila = `<tr class="selected" id="fila${cont}">


            <td><input type="text" name="codigo[]" value="${codigo}" readonly></td>
            <td><input type="text" name="cuenta[]" value="${cuenta}" readonly></td>`;

        if (opcionSeleccionada === "debitoSI") {
            fila += `<td><input type="text" name="debitosSI[]" value="${valor}" readonly></td>
                    <td><input type="text" name="creditosSI[]" value="0" readonly></td>`;
            subTotalDebito[cont] = valor;
            totalDebito += valor;
        } else if (opcionSeleccionada === "creditoSI") {
            fila += `<td><input type="text" name="debitosSI[]" value="0" readonly></td>
                    <td><input type="text" name="creditosSI[]" value="${valor}" readonly></td>`;
            subTotalCredito[cont] = valor;
            totalCredito += valor;
        }

        fila += `</tr>`;
        cont++;

        console.log(fila);


        limpiar();
        evaluar();


        $("#totalDebitosSI").html("Q/. " + totalDebito.toFixed(2));
        $("#totalCreditosSI").html("Q/. " + totalCredito.toFixed(2));
        $("#detalles").append(fila);

    } else {
        alerta();
    }
}

function limpiar() {
    $("#codigo_pc").val("");
    $("#cuenta_pc").val("");
    $("#valor").val("");
    $("input[name='opcion']").prop('checked', false); // Desmarca las opciones de radio

    // Reiniciar el select para seleccionar "Seleccione una opción"
    $("#cuenta_contable").val('');
    $("#cuenta_contable").selectpicker('refresh'); // Esto actualiza el selectpicker
}


function evaluar() {
    if (totalDebito === totalCredito) {
        $("#guardar").show();
    } else {
        $("#guardar").hide();
    }
}

// function eliminar(datosFila) {
//     const opcionSeleccionada = $("input[name='opcion']:checked").val();

//     if (opcionSeleccionada === "debitoSI" && subTotalDebito[datosFila] !== undefined) {
//         totalDebito -= subTotalDebito[datosFila];
//         subTotalDebito[datosFila] = 0;
//     } else if (opcionSeleccionada === "creditoSI" && subTotalCredito[datosFila] !== undefined) {
//         totalCredito -= subTotalCredito[datosFila];
//         subTotalCredito[datosFila] = 0;
//     }

//     console.log("Total Debito: " + totalDebito);
//     console.log("Total Crédito: " + totalCredito);

//     $("#totalDebitosSI").html("Q/. " + totalDebito.toFixed(2));
//     $("#totalCreditosSI").html("Q/. " + totalCredito.toFixed(2));

//     $("#fila" + datosFila).remove();
//     evaluar();
// }




function alerta() {
    Swal.fire({
        title: 'Error al ingresar el detalle a la tabla',
        text: "¡Revise los datos!",
        icon: 'error',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
    });
}

</script>
@endpush


@endsection









