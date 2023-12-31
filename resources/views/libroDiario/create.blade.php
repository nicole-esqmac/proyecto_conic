<!--*********************** VISTA CREAR LIBRO DIARIO *****************************-->

@extends('layouts.vistaAdmin')

@section('title','Libro Diario')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif

<!-- Content -->
      <div class="container">
          <section class="py-5">
            <h1 class="font-weight-bold mb-0" align="center">REGISTRO LIBRO DIARIO</h1>
            <p class="lead text-muted">Revisa el contenido</p>
          </section>

          <div class="container-fluid" class="block mb-8">
            <a href="{{ route('libroDiario.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i>&nbsp; Regresar</a>
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

    <form action="{{ route("libroDiario.store")}}" method="POST"   autocomplete="off">
        @csrf

        <div class="card">
            <div class="card-body" style="background: #b2bdb5e5">

        <fieldset>
            <legend><i class="bi bi-journal-text"></i>&nbsp; Agregar Libro Diario</legend>
            <div class="container-fluid">
                {{-- 1ra fila --}}
                <div class="row">

                    {{-- SELCT OPTION DINAMICO --}}
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="idEntidad">Nombre Entidad</label>
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

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') }}" class="form-control" oninput="this.value = this.value.toUpperCase()">
                        </div>
                    </div>

                    <div class="col-12 col-md-2">
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
                {{-- FORMULARIO PARA AGREGAR  LOS DETALLES DE LIBRO DIAIRO --}}
                <div class="col-12 col-md-4">
                    <div class="form-group">
                    <label for="cuenta_contable">Cuenta contable</label>
                        <div class="search_select_box">
                            <select id="cuenta_contable" name="cuenta_contable"  data-live-search="true" class="w-100">
                                <option  selected disabled>Seleccione una opción</option>

                                @foreach ($detallePlanCuentaAuxiliar as $dato)
                                    <option value="{{$dato->codigo}}_{{$dato->cuenta}}">{{$dato->cuenta_contable}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>



                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="codigo">Código cuenta</label>
                        <input disabled type="text" name="codigo" id="codigo" class="form-control" placeholder="codigo cuenta">
                    </div>
                </div>

                <div class="col-12 col-md-4">
                        <label for="cuenta">Nombre cuenta</label>
                        <input disabled type="text" name="cuenta" id="cuenta" class="form-control" placeholder="nombre cuenta">
                </div>

                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="valor">Moto</label>
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
                            <input class="form-check-input" type="radio" name="opcion" id="debitoLD" value="debitoLD">
                            <label class="form-check-label" for="debito">Débito</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="opcion" id="creditoLD" value="creditoLD">
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
                  <button type="button" id="agregar" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i>&nbsp; Agregar</button>
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
                        <th style="font-size: 20px" id="totalDebitosLD">Q/. 0.00</th>
                        <th style="font-size: 20px" id="totalCreditosLD">Q/. 0.00</th>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@push('scripts')
<script>
    $(document).ready(function() {
       $("#agregar").click(function() {
           agregar();
       });
   });

   let cont = 0;
   let totalDebito = 0;
   let totalCredito = 0;
   let subTotalDebito = [];
   let subTotalCredito = [];



   $("#guardar").hide();
   $("#cuenta_contable").change(mostrarValores);

   function mostrarValores() {
      const datos = document.getElementById('cuenta_contable').value.split('_');
      $("#cuenta").val(datos[1]);
      $("#codigo").val(datos[0]);
   }

   function agregar() {
       codigo = $('#codigo').val();
       cuenta = $('#cuenta').val();
       valor = parseFloat($('#valor').val()); // Convertir el valor a un número


       // Captura la opción seleccionada (Débito o Crédito)
       let opcionSeleccionada = $("input[name='opcion']:checked").val();

       if (codigo != "" && cuenta != "" && valor>0 && !isNaN(valor) && opcionSeleccionada) {

        // <td><button type="button" class="btn btn-warning" onclick="eliminar(${cont});">X</button></td>

           let fila = `<tr class="selected" id="fila${cont}">

               <td><input type="text" name="codigo[]" value="${codigo}" readonly></td>
               <td><input type="text" name="cuenta[]" value="${cuenta}" readonly></td>`;

           if (opcionSeleccionada === "debitoLD") {
               fila += `<td><input type="text" name="debitosLD[]" value="${valor}" readonly></td>
                       <td><input type="text" name="creditosLD[]" value="0" readonly></td>`;
               subTotalDebito[cont] = valor;
               totalDebito += valor;
           } else if (opcionSeleccionada === "creditoLD") {
               fila += `<td><input type="text" name="debitosLD[]" value="0" readonly></td>
                       <td><input type="text" name="creditosLD[]" value="${valor}" readonly></td>`;
               subTotalCredito[cont] = valor;
               totalCredito += valor;
           }

           fila += `</tr>`;
           cont++;

           console.log(fila);



           limpiar();
           $("#totalDebitosLD").html("Q/. " + totalDebito.toFixed(2));
           $("#totalCreditosLD").html("Q/. " + totalCredito.toFixed(2));
           evaluar();
           $("#detalles").append(fila);

       } else {
           alerta();
       }
   }

   function limpiar() {
       $("#codigo").val("");
       $("#cuenta").val("");
       $("#valor").val("");
       $("input[name='opcion']").prop('checked', false); // Desmarca las opciones de radio

       // Reiniciar el select para seleccionar "Seleccione una opción"
       $("#cuenta_contable").val('');
       $("#cuenta_contable").selectpicker('refresh'); // Esto actualiza el selectpicker
   }


   function evaluar() {

       if ((totalDebito>0 && totalCredito>0) && (totalDebito === totalCredito)) {
           $("#guardar").show();
       } else {
           $("#guardar").hide();
       }
   }


//    function eliminar(datosFila) {
//     // Aquí asumimos que datosFila es un índice válido
//     const opcionSeleccionada = $("input[name='opcion']:checked").val();
//     if (opcionSeleccionada === "debitoLD") {
//         totalDebito = totalDebito - subTotalDebito[datosFila];
//     } else if (opcionSeleccionada === "creditoLD") {
//         totalCredito = totalCredito - subTotalCredito[datosFila];
//     }

//     $("#totalDebitosLD").html("Q/. " + totalDebito.toFixed(2));
//     $("#totalCreditosLD").html("Q/. " + totalCredito.toFixed(2));
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








