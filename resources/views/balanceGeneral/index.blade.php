<!--*********************** VISTA INDEX BALANCE GENERAL *****************************-->

@extends('layouts.vistaContador')

@section('title','Balance General')

@section('menuLateral')

@if(Session::has('mensaje'))
  {{ Session::get('mensaje')}}
 @endif

<!-- CONTENIDO -->
      <div class="container">
          <section class="py-5">
            <h1 class="font-weight-bold mb-0" align="center">BALANCE GENERAL</h1>
            <p class="lead text-muted">Revisa el contenido</p>
          </section>

          <script>
            window.onload = function() {
                //  mensaje
                // alert("El  módulo contador no está habilitado");
                alerta();
                setInterval(alerta, 5000);
            }

                        function alerta() {
                Swal.fire({
                    title: 'El  módulo contador no está habilitado',
                    text: "¡Gracias por su comprensión!",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            }
        </script>



  <!-- TABLA BLANCE GENERAL -->

            <legend><i class="bi bi-table"></i> &nbsp; Tabla de detalle Balance General</legend>
            <br>
        <div class="card">
            <div class="card-body">
            <div class="table-responsive">

                <section>

                    <table id="tablaBalanceGeneral" class="table table-borderless" style="width:100%">
                        <thead>
                            <tr>
                                <th style="color: black">CUENTA CONTABLE</th>
                                <th style="color: black">DETALLE</th>
                                <th style="color: black">SUB-TOTAL</th>
                                <th style="color: black">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
<!-- ***************************ACTIVO CORRIENTE*********************************** -->
                            <tr>
                                <td>11 ACTIVO CORRIENTE</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @forelse ($planCuentas as $dato)
                            @if ($dato->claseCuenta->id == 1 &&
                                $dato->grupoCuenta->id >= 1 && $dato->grupoCuenta->id <= 1 &&
                                $dato->estadoFinanciero->id == 1)
                                <tr class="roboto-medium">
                                    <td>{{ $dato->codigo_pc }} {{ $dato->cuenta_pc}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="4">NO HAY REGISTROS EN LA BASE DE DATOS</td>
                            </tr>
                            @endforelse
 <!-- ****************************ACTIVO NO CORRIENTE*********************************** -->
                            <tr>
                                <td>12 ACTIVO NO CORRIENTE</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @forelse ($planCuentas as $dato)
                            @if ($dato->claseCuenta->id == 1 &&
                                $dato->grupoCuenta->id >= 2 && $dato->grupoCuenta->id <= 2 &&
                                $dato->estadoFinanciero->id == 1)
                                <tr class="roboto-medium">
                                    <td>{{ $dato->codigo_pc }} {{ $dato->cuenta_pc }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="4">NO HAY REGISTROS EN LA BASE DE DATOS</td>
                            </tr>
                            @endforelse
<!-- *******************************PASIVO CORRIENTE************************************* -->
                            <tr>
                                <td>21 PASIVO CORRIENTE</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @forelse ($planCuentas as $dato)
                            @if ($dato->claseCuenta->id == 2 &&
                                $dato->grupoCuenta->id >= 3 && $dato->grupoCuenta->id <= 3 &&
                                $dato->estadoFinanciero->id == 1)
                                <tr class="roboto-medium">
                                    <td>{{ $dato->codigo_pc }} {{ $dato->cuenta_pc }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                            @empty
<!-- **********************************PASIVO NO CORRIENTE****************************************** -->
                            <tr>
                                <td colspan="4">NO HAY REGISTROS EN LA BASE DE DATOS</td>
                            </tr>
                            @endforelse
                            <tr>
                                <td>22 PASIVO NO CORRIENTE</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @forelse ($planCuentas as $dato)
                            @if ($dato->claseCuenta->id == 2 &&
                                $dato->grupoCuenta->id >= 4 && $dato->grupoCuenta->id <= 4 &&
                                $dato->estadoFinanciero->id == 1)
                                <tr class="roboto-medium">
                                    <td>{{ $dato->codigo_pc }} {{ $dato->cuenta_pc }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="4">NO HAY REGISTROS EN LA BASE DE DATOS</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </section>
            </div>
        </div>

  </div>


  <br>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@push('scripts')
<script>
$(function(){
    $("#tablaBalanceGeneral").DataTable(dataTableOpciones);

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
            lengthMenu:[15,25,50],



        columnDefs: [{orderable:false, target:[0,1,2,3]}
        ],


        pageLength: 10,
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


