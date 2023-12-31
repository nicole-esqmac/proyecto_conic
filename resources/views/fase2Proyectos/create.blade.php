<!--*********************** VISTA CREAR FASE2 PROYECTOS *****************************-->

@extends('layouts.vistaProyecto')

@section('title','Fase2 Proyecto')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif

<!-- CONTENIDO -->
      <div class="container">
          <section class="py-5">
            <h1 class="font-weight-bold mb-0" align="center">REGISTRO FASE 2 - BENEFICIARIO</h1>
            <p class="lead text-muted">Revisa el contenido</p>
          </section>

          <div class="container-fluid" class="block mb-8">
            <a href="{{ route('fase2Proyectos.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i>&nbsp; Regresar</a>
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


<!-- FORMULARIO DE REGISTRO DE BENEFICIARIOS FASE 2 PROYECTO -->
<div class="container-fluid">
    <form action="{{ route("fase2Proyectos.store")}}" method="post"  autocomplete="off">
        @csrf
        <fieldset class="form-neon">
        <legend><i class="bi bi-file-plus-fill"></i>&nbsp; Registro Beneficiario</legend>
            <div class="container-fluid">
                <div class="row">
                    {{-- SELCT OPTION DINAMICO --}}

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                          <label for="idResponsableProyecto">ID RESPONSABLE PROYECTO</label>
                            <div class="search_select_box">
                                <select id="idResponsableProyecto" name="idResponsableProyecto" class="w-100" data-live-search="true">
                                    <option  selected disabled>Seleccione una opción</option>
                                        @forelse ($responsableProyecto as $dato)
                                        <option value="{{$dato->id}}">{{$dato->id}} - {{$dato->nombre}} {{$dato->apellido}}</option>
                                        @empty
                                        <p>No hay registro</p>

                                        @endforelse
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label for="observacion">Observaciones</label>
                            <textarea id="observacion" name="observacion"  class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" maxlength="200">{{ old('observacion') }}</textarea>
                        </div>
                    </div>



</fieldset>



<br><br>


<fieldset class="form-neon" id="guardar">
    <h2>DATOS BENEFICIARIO</h2>
    <table class="table table-bordered" id="table">
        <tr>
            <th>DPI</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>DIRECCION</th>
            <th>ACCION</th>
        </tr>
        <tr>
            <td><input type="text" name="inputs[0][dpi]" id="dpi" value="{{ old ('dpi') }}" placeholder="dpi" class="form-control"></td>
            <td><input type="text" name="inputs[0][nombre]" id="nombre" value="{{ old ('nombre') }}" placeholder="nombre" class="form-control"></td>
            <td><input type="text" name="inputs[0][apellido]" id="apellido" value="{{ old ('apellido') }}" placeholder="apellido" class="form-control"></td>
            <td><input type="text" name="inputs[0][direccion]" id="direccion" value="{{ old ('direccion') }}" placeholder="direccion" class="form-control"></td>
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
// let dpi=$('#dpi').val();
let nombre=$('#nombre').val();
let apellido=$('#apellido').val();
let observacion=$('#observacion').val();



//-------------------------VALIDACION DE CAMPOS QUE SOLO SEA NUMEROS------------------------

const dpiInput = document.getElementById("dpi");

dpiInput.addEventListener("input", function () {
    // Elimina cualquier caracter no numérico o negativo del valor del campo
    this.value = this.value.replace(/[^0-9]/g, "");

    // Asegura que el valor sea un número positivo
    if (parseInt(this.value) < 0) {
        this.value = ""; // Borra el valor si es negativo
    }

    // Valida la longitud de 13 dígitos
    if (this.value.length > 13) {
        this.value = this.value.slice(0, 13); // Limita la longitud a 13 dígitos
    }
});






//-----------------------------FUNCION BOTON AGREGAR INPUT DINAMICOS----------------------------------
$('#agregar').click(function(){

    ++i;
    $('#table').append(
        `<tr>
            <td>
                <input type="text" name="inputs[${i}][dpi]" id="dpi_${i}" class="form-control dpi-beneficiario" placeholder="dpi">
            </td>
            <td>
                <input type="text" name="inputs[`+i+`][nombre]"  placeholder="nombre" class="from-control"/>
            </td>
            <td>
                <input type="text" name="inputs[`+i+`][apellido]"  placeholder="apellido" class="from-control"/>
            </td>
            <td>
                <input type="text" name="inputs[`+i+`][direccion]"  placeholder="direccion" class="from-control"/>
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-table-row">X</button>
            </td>
        </tr>`);

       // Validar campos de código auxiliar
    validarCodigo();
});

//---------------------------------FUNCION VALIDAR CODIGO NO DUPLICADO------------------------------
function validarCodigo() {
    let dpis = [];

    $('.dpi-beneficiario').each(function() {
        let dpi = $(this).val();

        if (dpis.includes(dpi)) {
            alert('No se pueden agregar códigos duplicados.');
            $(this).val(''); // Borra el valor duplicado
        } else {
            dpis.push(dpi);
        }
    });


}

//------------------------INPUT CODIGO SOLO NUMERO POSITIVO-------------------------------
$(document).on('input', 'input[id^="dpi_"]', function () {
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

    // Valida la longitud de 13 dígitos
    if (this.value.length > 13) {
        this.value = this.value.slice(0, 13); // Limita la longitud a 13 dígitos
    }
});


//REMOVER DATOS DE LA TABLA INPUTS
$(document).on('click','.remove-table-row', function(){
    $(this).parents('tr').remove();
});



</script>



@endsection



