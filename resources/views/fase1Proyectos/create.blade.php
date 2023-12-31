<!--*********************** VISTA CREAR FASE1 PROYECTOS *****************************-->

@extends('layouts.vistaProyecto')

@section('title','Fase1 Proyecto')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif


	<div class="container">
		  <section class="py-5">
				<h2 class="font-weight-bold mb-0"><i class="bi bi-person-plus-fill"></i>&nbsp; CREAR FASE 1 MONTO/APORTE</h2>
				<p class="lead text-muted">Revisa el contenido</p>
			</section>

            <div class="container-fluid" class="block mb-8">
                <a href="{{ route('fase1Proyectos.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i>&nbsp; Regresar</a>
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

	   <!-- CONTENIDO FORMULARIO-->
			<div class="container-fluid">
				<form action="{{ route("fase1Proyectos.store")}}" method="post" enctype="multipart/form-data" class="form-neon" autocomplete="off">
					{!! csrf_field() !!}
                    {{-- @csrf --}}
					<fieldset>
						<legend><i class="bi bi-person-fill"></i> &nbsp; Información</legend>
						<div class="container-fluid">
							<div class="row">

                                <!-- SELCT OPTION DINAMICO -->
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                    <label for="idResponsableProyecto">ID RESPONSABLE PROYECTO</label>
                                        <div class="search_select_box">
                                            <select id="idResponsableProyecto" name="idResponsableProyecto"  data-live-search="true" class="w-100">
                                                <option  selected disabled>Seleccione una opción</option>
                                                    @foreach ($responsableProyecto as $dato)
                                                    <option value="{{$dato->id}}">{{$dato->id}} - {{$dato->nombre}} {{$dato->apellido}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>



                               <!-- SELCT OPTION ESTATICO -->
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="tipo_banco">Tipo de Banco</label>
										<select id="tipo_banco" name="tipo_banco" class="form-select" aria-label="Default select example">
											<option selected disabled>Seleccione un dato</option>
											@foreach ($bancoFase1Proyectos as $dato)
										        <option value="{{$dato->nombre_banco}}">{{$dato->nombre_banco}}</option>
										    @endforeach
										</select>
									</div>
								</div>




								<div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="cantidad_por_persona">Cantidad de personas por boleta</label>
                                        <input type="text" name="cantidad_por_persona" id="cantidad_por_persona" value="{{ old('cantidad_por_persona') }}" class="form-control" pattern="[0-9]{1,20}" placeholder="Solo números" title="Solo números">
                                    </div>
                                </div>


								<div class="col-12 col-md-4">
                                    <label for="monto">Monto</label>
                                    <div class="input-group form-group">
                                        <span class="input-group-text">Q</span>
                                        <input type="text" id="monto" name="monto" value="{{ old('monto') }}" class="form-control" placeholder="Ejemplo: 10.00" oninput="validarNumero(this)">
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
                                    <div class="form-group">
                                        <label for="photo">Imagen</label>
                                        <input type="file" name="photo" id="photo" value="{{ old('photo') }}" accept=".jpg, .jpeg, .png" class="form-control">
                                        @error('photo')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-12 col-md-4">
									<div class="form-group">
										<label for="direccion_area">Dirección del área responsable</label>
										<textarea id="direccion_area" name="direccion_area"class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" maxlength="200">{{ old('direccion_area') }}</textarea>
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

