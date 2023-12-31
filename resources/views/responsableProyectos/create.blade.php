<!--*********************** VISTA CREAR RESPONSABLE PROYECTOS *****************************-->

@extends('layouts.vistaProyecto')

@section('title','Responsable Proyectos')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif

{{-- <div id="content"> --}}
	<div class="container">
		  <section class="py-5">
				<h2 class="font-weight-bold mb-0"><i class="bi bi-person-plus-fill"></i>&nbsp; CREAR RESPONSABLE DEL PROYECTO</h2>
				<p class="lead text-muted">Revisa el contenido</p>
			</section>

            <div class="container-fluid" class="block mb-8">
                <a href="{{ route('responsableProyectos.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i>&nbsp; Regresar</a>
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

	   <!-- Content FORMULARIO-->
			<div class="container-fluid">
				<form action="{{ route("responsableProyectos.store")}}" method="post" class="form-neon" autocomplete="off">
					@csrf
					<fieldset>
						<legend><i class="bi bi-person-fill"></i> &nbsp; Información</legend>
						<div class="container-fluid">
							<div class="row">

                                {{-- SELCT OPTION DINAMICO --}}
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                    <label for="idProyecto">ID PROYECTO</label>
                                        <div class="search_select_box">
                                            <select id="idProyecto" name="idProyecto"  data-live-search="true" class="w-100">
                                                <option  selected disabled>Seleccione una opción</option>
                                                    @foreach ($responsable_proyectos as $dato)
                                                    <option value="{{$dato->id}}">{{$dato->id}} {{$dato->titulo}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{-- SELCT OPTION ESTATICO --}}
								<div class="col-12 col-md-3">
									<div class="form-group">
										<label for="tipoDocumento">Tipo de Documento</label>
										<select id="tipoDocumento" name="tipoDocumento" class="form-select" aria-label="Default select example">
											<option selected disabled>Seleccione un dato</option @required(true)>
											<option>NIT</option>
											<option>DPI</option>
										</select>
									</div>
								</div>


								<div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="documento">Número documento</label>
                                        <input type="text" name="documento" id="documento" value="{{ old('documento') }}" class="form-control" placeholder="Solo números" inputmode="numeric" title="solo números" required oninput="validarLongitud(this)">
                                    </div>
                                </div>


                                <script>
                                    function validarLongitud(input) {
                                        const valor = input.value;
                                        if (valor.length !== 8 && valor.length !== 13) {
                                            input.setCustomValidity("Debe tener 8 o 13 dígitos");
                                        } else {
                                            input.setCustomValidity("");
                                        }
                                    }
                                </script>


                                <div class="col-12 col-md-2">
									<div class="form-group">
										<label class="radio inline">
											<input type="radio" name="sexo" value="Masculino">
											<span> Masculino </span>
										</label>
										<br>
										<label class="radio inline">
											<input type="radio" name="sexo" value="Femenino">
											<span>Femenino </span>
										</label>
									</div>
								</div>

								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="nombre">Nombre</label>
										<input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" title="solo letras"  maxlength="25">
									</div>
								</div>

								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="apellido">Apellido</label>
										<input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" title="solo letras"   maxlength="25">
									</div>
								</div>



                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="edad">Edad</label>
                                        <input type="text" name="edad" id="edad" value="{{ old('edad') }}" class="form-control" pattern="^\d+$" maxlength="3" title="solo números" required>
                                    </div>
                                </div>



								<div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Solo números" inputmode="numeric" pattern="[0-9]{8}" title="Debe contener 8 dígitos numéricos" required>
                                    </div>
                                </div>



								<div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        <input type="text" name="celular" id="celular" value="{{ old('celular') }}" class="form-control" placeholder="Solo números" inputmode="numeric" pattern="[0-9]+" title="solo números" placeholder="solo números" required maxlength="8">
                                    </div>
                                </div>


                                {{-- SELCT OPTION ESTATICO --}}
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="estado">Estado</label>
										<select id="estado" name="estado" class="form-select" aria-label="Default select example">
											<option selected disabled>Seleccione un dato</option>
											<option>ACTIVO</option>
											<option>INACTIVO</option>
										</select>
									</div>
								</div>

                                <div class="col-12 col-md-4">
									<div class="form-group">
										<label for="direccion">Dirección</label>
										<textarea id="direccion" name="direccion"class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" maxlength="200">{{ old('direccion') }}</textarea>
									</div>
								</div>


								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="observacion">Observaciones</label>
										<textarea id="observacion" name="observacion"class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" maxlength="200">{{ old('observacion') }}</textarea>
									</div>
								</div>

								<br><br><br><br>

							</div>

							</div>

							<br><br>

							{{-- BOTONES --}}
								<div class="container-fluid">
									<ul class="full-box list-unstyled page-nav-tabs">
										<div class="d-grid gap-2 d-md-block">
											<button class="btn btn-primary" type="submit"><i class="bi bi-save-fill"></i>&nbsp; Guardar</button>
											<button class="btn btn-primary" type="reset"><i class="bi bi-stars"></i>&nbsp; Limpiar</button>
										</div>
									</ul>
								</div>


						</div>
					</fieldset>

				</form>
        </section>
      </div>
</div>
</div>


@endsection

