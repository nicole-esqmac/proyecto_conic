<!--*********************** VISTA EDITAR EMPLEADOS *****************************-->

@extends('layouts.vistaAdmin')

@section('title','Admin-Empleados')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif


	<div class="container">
		  <section class="py-5">
				<h2 class="font-weight-bold mb-0"><i class="bi bi-person-plus-fill"></i>&nbsp; EDITAR USUARIO</h2>
				<p class="lead text-muted">Revisa el contenido</p>
			</section>

            <div class="container-fluid" class="block mb-8">
                <a href="{{ route('empleados.index') }}" class="btn btn-secondary"><i class="bi bi-backspace-fill"></i>&nbsp; Regresar</a>
            </div>

			<br>



	  <!-- CONTENT FORMULARIO EDITABLE -->
			<div class="container-fluid">
				<form action="{{ route("empleados.update", $empleados->id)}}" method="post" class="form-neon" autocomplete="off">
					@csrf
					@method("PUT")
					<fieldset>
						<legend><i class="bi bi-person-fill"></i> &nbsp; Información personal</legend>
						<div class="container-fluid">
							<div class="row">

								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="dpi">DPI</label>
										<input type="text" name="dpi" id="dpi" class="form-control" placeholder="Solo números" maxlength="13" value="{{ $empleados->dpi }}" Required>
									</div>
								</div>

								<div class="col-12 col-md-3">
									<div class="form-group">
										<label for="nombre">Nombre</label>
										<input type="text" name="nombre" id="nombre" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}"   maxlength="25" value="{{ $empleados->nombre}}">
									</div>
								</div>

								<div class="col-12 col-md-3">
									<div class="form-group">
										<label for="apellido">Apellido</label>
										<input type="text" name="apellido" id="apellido" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" maxlength="25" value="{{ $empleados->apellido}}">
									</div>
								</div>

                                {{-- PROGRMACION--}}
								@if ( $empleados->sexo=='Masculino')
                                @php ($hombre = 'checked')
                                @php ($mujer = '')
                            @else
                                @php ($hombre = '')
                                @php ($mujer = 'checked')
                            @endif

								<div class="col-12 col-md-2">
									<div class="form-group">
										<label class="radio inline">
											<input type="radio" name="sexo" value="Masculino" {{ $hombre }}>
                                            <span> Masculino </span>
										</label>
										<br>
										<label class="radio inline">
											<input type="radio" name="sexo" value="Femenino" {{ $mujer }}>
                                            <span>Femenino </span>
										</label>
									</div>
								</div>

								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="fechadenacimiento">Fecha de nacimiento</label>
										<input type="date" name="fechadenacimiento" id="fechadenacimiento"
										class="form-control" value="{{ $empleados->fechadenacimiento}}">
									</div>
								</div>

								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="telefono">Teléfono</label>
										<input type="telefono" name="telefono" id="telefono" value="{{ $empleados->telefono}}" class="form-control" placeholder="77217896"  maxlength="8">
									</div>
								</div>

								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="celular">Celular</label>
										<input type="celular" name="celular" id="celular" value="{{ $empleados->celular}}" class="form-control" placeholder="48129875"  maxlength="8">
									</div>
								</div>



								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="direccion">Dirección</label>
										<textarea id="direccion" name="direccion"class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" maxlength="200">{{ $empleados->direccion}}</textarea>
									</div>
								</div>

								<div class="col-12 col-md-6">
									<label for="salario">Salario</label>
									<div class="input-group form-group">
										<span class="input-group-text">Q</span>
										<input type="text" id="salario" name="salario" value="{{ $empleados->salario}}" class="form-control" pattern="[0-9-]{1,20}"placeholder="Solo números">
									</div>
								</div>




							</div>

							</div>

							<br><br>

							{{-- BOTONES --}}
                            <div class="container-fluid">
                                <ul class="full-box list-unstyled page-nav-tabs">
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary" type="submit"><i class="bi bi-arrow-clockwise"></i>&nbsp; Editar</button>
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
