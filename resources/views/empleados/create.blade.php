<!--*********************** VISTA CREAR EMPLEADOS *****************************-->

@extends('layouts.vistaAdmin')

@section('title','Admin-Empleados')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif


	<div class="container">
		  <section class="py-5">
				<h2 class="font-weight-bold mb-0"><i class="bi bi-person-plus-fill"></i>&nbsp; REGISTRO EMPLEADOS</h2>
				<p class="lead text-muted">Revisa el contenido</p>
			</section>

            <div class="container-fluid" class="block mb-8">
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i> Regresar</a>
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

	   <!-- CONTENT FORMULARIO CREAR-->
			<div class="container-fluid">
				<form action="{{ route("empleados.store")}}" method="post" class="form-neon" autocomplete="off">
					@csrf
					<fieldset>
						<legend><i class="bi bi-person-fill"></i> &nbsp; Información personal</legend>
						<div class="container-fluid">
							<div class="row">

								<div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="dpi">DPI</label>
                                        <input type="text" name="dpi" id="dpi" value="{{ old('dpi') }}" class="form-control" placeholder="Solo números (13 dígitos)" maxlength="13" required pattern="[0-9]{13}" title="Ingresa exactamente 13 dígitos numéricos">
                                    </div>
                                </div>



								<div class="col-12 col-md-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" maxlength="35" title="Ingresa solo letras">
                                    </div>
                                </div>


								<div class="col-12 col-md-3">
									<div class="form-group">
										<label for="apellido">Apellido</label>
										<input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}"   maxlength="35" title="Ingresa solo letras">
									</div>
								</div>

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
										<label for="fechadenacimiento">Fecha de nacimiento</label>
										<input type="date" name="fechadenacimiento" id="fechadenacimiento"
										value="{{ old('fechadenacimiento') }}" class="form-control">
									</div>
								</div>

								<div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="tel" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control"  pattern="[0-9]{8}" maxlength="8" placeholder="solo números" required>
                                    </div>
                                </div>


								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="celular">Celular</label>
										<input type="tel" name="celular" id="celular" value="{{ old('celular') }}" class="form-control"  pattern="[0-9]{8}"  maxlength="8" placeholder="solo números" required>
									</div>
								</div>



								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="direccion">Dirección</label>
										<textarea id="direccion" name="direccion"class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" maxlength="200">{{ old('direccion') }}</textarea>
									</div>
								</div>

								<div class="col-12 col-md-6">
                                    <label for="salario">Salario</label>
                                    <div class="input-group form-group">
                                        <span class="input-group-text">Q</span>
                                        <input type="text" id="salario" name="salario" value="{{ old('salario') }}" class="form-control" pattern="^\d{1,20}(\.\d{2})?$" placeholder="solo números" required>
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
