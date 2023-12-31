<!--*********************** VISTA CREAR PLAN CUENTAS *****************************-->

@extends('layouts.vistaAdmin')

@section('title','Plan Cuentas')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif

<!-- CONTENT -->
      <div class="container">
          <section class="py-5">
            <h1 class="font-weight-bold mb-0" align="center">REGISTRO DE CUENTAS Y AUXILIARLES</h1>
            <p class="lead text-muted">Revisa el contenido</p>
          </section>

          <div class="container-fluid" class="block mb-8">
            <a href="{{ route('planCuentas.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i>&nbsp; Regresar</a>
        </div>


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
    <form action="{{ route("planCuentas.store")}}" method="post"  autocomplete="off">
        @csrf
        <fieldset class="form-neon">
        <legend><i class="bi bi-file-plus-fill"></i>&nbsp; Registro de cuentas</legend>
            <div class="container-fluid">
                <div class="row">

                    {{-- SELCT OPTION DINAMICO --}}
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                          <label for="idClaseCuenta">ID CLASE CUENTA</label>
                            <div class="search_select_box">
                                <select id="idClaseCuenta" name="idClaseCuenta" class="w-100" data-live-search="true">
                                    <option  selected disabled>Seleccione una opción</option>
                                        @forelse ($claseCuentas as $dato)
                                        <option value="{{$dato->id}}">{{$dato->codigo_cuenta}} {{$dato->nombre_cuenta}}</option>
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
                                        @forelse ($grupoCuentas as $dato)
                                        <option value="{{$dato->id}}">{{$dato->codigo_cuenta}} {{$dato->nombre_cuenta}}</option>
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
                                        @forelse ($estadoFinanciero as $dato)
                                        <option value="{{$dato->id}}">{{$dato->estadoFinanciero}}</option>
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
            <input type="text" name="codigo_pc" id="codigo_pc" inputmode="numeric" pattern="[0-9]+" class="form-control" placeholder="solo números positivos" value="{{ old('codigo_pc') }}">
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="form-group">
            <label for="cuenta_pc">Nombre cuenta</label>
            <input type="text" name="cuenta_pc" id="cuenta_pc" class="form-control" oninput="this.value = this.value.toUpperCase();" value="{{ old('cuenta_pc') }}">
        </div>
    </div>


      <div class="col-12 col-md-4">
        <div class="form-group">
          <label for="cuenta">¿Tiene auxiliar?</label>
          <select class="form-select" name="selectAuxiliar" id="selectAuxiliar" aria-label="Default select example">
            <option selected>Seleccione una opción</option>
            <option value="1">Si</option>
            <option value="2">No</option>
         </select>
        </div>
      </div>
</fieldset>


{{-- BOTON DE REGISTRAR--}}
        <fieldset class="form-neon" id="registrar" style="display: none;">
            <div class="container-fluid">
              <ul class="full-box list-unstyled page-nav-tabs">
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-primary"><i class="bi bi-check-square-fill"></i>&nbsp; Registar</button>
                    <button type="reset" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i>&nbsp; Nuevo</button>
                </div>
              </ul>
            </div>
        </fieldset>





<br><br>


<fieldset class="form-neon" id="guardar" style="display: none;">
    <h2>AUXILIAR</h2>
    <table class="table table-bordered" id="table">
        <tr>
            <th>CODIGO AUXILIAR</th>
            <th>NOMBRE AUXILIAR</th>
            <th>ACCION</th>
        </tr>
        <tr>
            <td><input type="text" name="inputs[0][codigo]" id="codigo" value="{{ old ('codigo') }}" placeholder="código auxiliar" class="form-control"></td>
            <td><input type="text" name="inputs[0][cuenta]" id="cuenta" value="{{ old ('cuenta') }}" placeholder="cuenta auxiliar" class="form-control"></td>
            <td><button type="button" name="agregar" id="agregar" class="btn btn-success">Agregar</button></td>
        </tr>
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
//-----------------------DECLARACION DE VARIABLES--------------------------
let i=0;
let cuentaAux=$('#cuenta').val();


const selectAuxiliar = document.getElementById("selectAuxiliar");
const guardarFieldset = document.getElementById("guardar");
const registrarFieldset = document.getElementById("registrar");


//----------------------------------CONDICION SELECT VISIBLE O INVISIBLE---------------------------------
    selectAuxiliar.addEventListener("change", function () {
      if (selectAuxiliar.value === "1") {
        guardarFieldset.style.display = "block"; // Mostrar el campo AUXILIAR
        registrarFieldset.style.display = "none";// Ocultar el campo AUXILIAR
      } else {
        guardarFieldset.style.display = "none"; // Ocultar el campo AUXILIAR
        registrarFieldset.style.display = "block";// Mostrar el campo AUXILIAR
      }
    });


//-------------------------VALIDACION DE CAMPOS QUE SOLO SEA NUMEROS------------------------
    const codigoInput = document.getElementById("codigo_pc");

          codigoInput.addEventListener("input", function () {
            // Elimina cualquier caracter no numérico o negativo del valor del campo
            this.value = this.value.replace(/[^0-9]/g, "");

            // Asegura que el valor sea un número positivo
            if (parseInt(this.value) < 0) {
              this.value = ""; // Borra el valor si es negativo
            }
          });

    const codigoAuxiliarInput = document.getElementById("codigo");

          codigoAuxiliarInput.addEventListener("input", function () {
            // Elimina cualquier caracter no numérico o negativo del valor del campo
            this.value = this.value.replace(/[^0-9]/g, "");

            // Asegura que el valor sea un número positivo
            if (parseInt(this.value) < 0) {
              this.value = ""; // Borra el valor si es negativo
            }
          });

//-----------------------------FUNCION BOTON AGREGAR INPUT DINAMICOS----------------------------------
$('#agregar').click(function() {
    // Obtiene los valores de los campos existentes en HTML
    const codigoInputValue = $('#codigo').val().trim();
    const cuentaInputValue = $('#cuenta').val().trim();

    // Verifica si los campos existentes están vacíos
    if (codigoInputValue === '' || cuentaInputValue === '') {
        alert('Por favor, complete los campos existentes antes de agregar nuevos campos.');
        return;
    }

    // Obtiene los valores de los campos de la nueva fila
    const nuevoCodigo = $('input[name="inputs[' + i + '][codigo]"]').val().trim();
    const nuevaCuenta = $('input[name="inputs[' + i + '][cuenta]"]').val().trim();

    // Verifica si los campos de la nueva fila están vacíos
    if (nuevoCodigo === '' || nuevaCuenta === '') {
        alert('Por favor, complete los campos  antes de agregar una nueva fila.');
        return;
    }


    // Agrega la nueva fila a la tabla
    ++i;
    $('#table').append(
        `<tr>
            <td>
                <input type="text" name="inputs[${i}][codigo]" id="codigo_${i}" class="form-control codigo-auxiliar" placeholder="código auxiliar">
            </td>
            <td>
                <input type="text" name="inputs[${i}][cuenta]" id="cuenta_${i}"  placeholder="cuenta auxiliar" class="form-control"/>
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-table-row">X</button>
            </td>
        </tr>`);

    // Validar campos de código auxiliar
    validarCodigo();
  });

  //REMOVER DATOS DE LA TABLA INPUTS
  $('#table').on('click', '.remove-table-row', function() {
      $(this).closest('tr').remove();
      i--; // Reducir el contador al eliminar una fila
  });


//---------------------------------FUNCION VALIDAR CODIGO NO DUPLICADO------------------------------
function validarCodigo() {
    let codigos = [];

    $('.codigo-auxiliar').each(function() {
        let codigo = $(this).val();

        if (codigos.includes(codigo)) {
            alert('No se pueden agregar códigos duplicados.');
            $(this).val(''); // Borra el valor duplicado
        } else {
            codigos.push(codigo);
        }
    });

    // Valor de los campos existentes en HTML
    const codigoInputValue = $('#codigo').val().trim();
    const cuentaInputValue = $('#cuenta').val().trim();

    // Verifica si los campos existentes están vacíos
    if (codigoInputValue === '' || cuentaInputValue === '') {
        alert('Por favor, complete los campos existentes en HTML antes de agregar nuevos campos.');
        return;
    }
}

//------------------------INPUT CODIGO SOLO NUMERO POSITIVO-------------------------------
$(document).on('input', 'input[id^="codigo_"]', function () {
    // Obtén el valor del campo actual
    let value = $(this).val();

    // Elimina cualquier caracter no numérico o negativo del valor
    value = value.replace(/[^0-9]/g, '');

    // Asegura que el valor sea un número positivo
    if (parseInt(value) < 0) {
        value = ''; // Borra el valor si es negativo
    }

    // Actualiza el valor del campo
    $(this).val(value);
});


</script>


@endsection



