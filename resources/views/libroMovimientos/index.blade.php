<!--*********************** VISTA INDEX LIBRO MOVIMIENTOS *****************************-->

@extends('layouts.vistaAdmin')

@section('title','Libro Movimientos')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif

<!-- CONTENIDO -->
      <div class="container">
          <section class="py-5">
            <h1 class="font-weight-bold mb-0" align="center">LISTADO DE MOVIMIENTOS</h1>
            <p class="lead text-muted">Revisa el contenido</p>
          </section>

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

  <br>



  <!-- TABLA DE MOVIMIENTOS -->
  <div class="container-fluid">
    <br>
    <div class="card">
        <div class="card-body">

  <section>
          <table id="tablaLibroMovimientos"  class="table table-dark" style="width:100%" >
            <thead>
              <tr class="roboto-medium">
                <th>No</th>
                <th>CODIGO</th>
                <th>CUENTA</th>
                <th>DEBITO</th>
                <th>CREDITO</th>
                <th>DEBITO SALDO INICIAL</th>
                <th>CREDITO SALDO INICIAL</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($detalleLibroMovimientos as $dato)
                <tr class="table-secondary  roboto-medium">
                    <td>{{ $dato->idLibroMovimiento }}</td>
                    <td>{{ $dato->codigo}}</td>
                    <td>{{ $dato->cuenta}}</td>
                    <td>{{ $dato->debitosLD}}</td>
                    <td>{{ $dato->creditosLD}}</td>
                    <td>{{ $dato->debitosSI}}</td>
                    <td>{{ $dato->creditosSI}}</td>

                @empty
                <p>NO HAY REGISTROS EN LA BASE DE DATOS</p>

                @endforelse
            </tbody>
          </table>
        </div>
    </fieldset>

    </section>

</div>
</div>

  </div>
</div>
</div>

@push('scripts')
<script>
$(function(){
    $("#tablaLibroMovimientos").DataTable(dataTableOpciones);

})

let dataTableOpciones = {
            dom: 'Bfrtilp',
            buttons:[
                {
                    extend:'excelHtml5',
                    text:"<i class='bi bi-file-earmark-excel-fill'></i>",
                    titleAttr:'Exportar a Excel',
                    className:'btn btn-success',
                },
                {
                    extend:'pdfHtml5',
                    text:"<i class='bi bi-file-earmark-pdf-fill'></i>",
                    titleAttr:'Exportar a PDF',
                    className:'btn btn-danger',
                },
                {
                    extend:'print',
                    text:"<i class='bi bi-printer-fill'></i>",
                    titleAttr:'Imprimir',
                    className:'btn btn-info',
                },
            ],
            lengthMenu:[25,50,75],
            columnDefs: [{orderable:false, target:[1,2,3,4,5,6]}
        ],
        pageLength: 15,
    language: {
    "aria": {
        "sortAscending": "Activar para ordenar la columna de manera ascendente",
        "sortDescending": "Activar para ordenar la columna de manera descendente"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmente"
    },
    "buttons": {
        "collection": "Colección",
        "colvis": "Visibilidad",
        "colvisRestore": "Restaurar visibilidad",
        "copy": "Copiar",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir",
        "createState": "Crear Estado",
        "removeAllStates": "Borrar Todos los Estados",
        "removeState": "Borrar Estado",
        "renameState": "Renombrar Estado",
        "savedStates": "Guardar Estado",
        "stateRestore": "Restaurar Estado",
        "updateState": "Actualizar Estado"
    },
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "processing": "Procesando...",
    "search": "Buscar:",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor",
        "conditions": {
            "date": {
                "after": "Después",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "Diferente de",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual a",
                "not": "Diferente de",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina con",
                "equals": "Igual a",
                "not": "Diferente de",
                "startsWith": "Inicia con",
                "notEmpty": "No vacío",
                "notContains": "No Contiene",
                "notEndsWith": "No Termina",
                "notStartsWith": "No Comienza"
            },
            "array": {
                "equals": "Igual a",
                "empty": "Vacío",
                "contains": "Contiene",
                "not": "Diferente",
                "notEmpty": "No vacío",
                "without": "Sin"
            }
        },
        "data": "Datos"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d",
        "countFiltered": "{shown} ({total})",
        "collapseMessage": "Colapsar",
        "showMessage": "Mostrar Todo"
    },
    "select": {
        "cells": {
            "1": "1 celda seleccionada",
            "_": "%d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        },
        "rows": {
            "1": "1 fila seleccionada",
            "_": "%d filas seleccionadas"
        }
    },
    "thousands": ",",
    "datetime": {
        "previous": "Anterior",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "am",
            "pm"
        ],
        "next": "Siguiente",
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "weekdays": [
            "Domingo",
            "Lunes",
            "Martes",
            "Miércoles",
            "Jueves",
            "Viernes",
            "Sábado"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "multi": {
            "title": "Múltiples Valores",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga click o toque aquí, de lo contrario conservarán sus valores individuales."
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\"> Más información<\/a>)."
        }
    },
    "decimal": ".",
    "emptyTable": "No hay datos disponibles en la tabla",
    "zeroRecords": "No se encontraron coincidencias",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
    "infoFiltered": "(Filtrado de _MAX_ total de entradas)",
    "lengthMenu": "Mostrar _MENU_ entradas",
    "stateRestore": {
        "removeTitle": "Eliminar",
        "creationModal": {
            "search": "Buscar",
            "button": "Crear",
            "columns": {
                "search": "Columna de búsqueda",
                "visible": "Columna de visibilidad"
            },
            "name": "Nombre:",
            "order": "Ordenar",
            "paging": "Paginar",
            "scroller": "Posición de desplazamiento",
            "searchBuilder": "Creador de búsquedas",
            "select": "Selector",
            "title": "Crear nuevo",
            "toggleLabel": "Incluye:"
        },
        "duplicateError": "Ya existe un valor con el mismo nombre",
        "emptyError": "No puede ser vacío",
        "emptyStates": "No se han guardado",
        "removeConfirm": "Esta seguro de eliminar %s?",
        "removeError": "Fallo al eliminar",
        "removeJoiner": "y",
        "removeSubmit": "Eliminar",
        "renameButton": "Renombrar",
        "renameLabel": "Nuevo nombre para %s:",
        "renameTitle": "Renombrar"
    },
    "infoEmpty": "No hay datos para mostrar"
},

};

</script>
@endpush

@endsection

