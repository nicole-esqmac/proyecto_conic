$(document).ready(function () {
    $("#enviarDatos").click(function () {
      var datos = obtenerDatosTabla();
      enviarDatosAlControlador(datos);
    });

    function obtenerDatosTabla() {
      var datos = [];
      $("#miTabla tbody tr").each(function () {
        var fila = $(this);
        var dato1 = fila.find("td:eq(0)").text();
        var dato2 = fila.find("td:eq(1)").text();
        var dato3 = fila.find("td:eq(2)").text();
        var dato4 = fila.find("td:eq(4)").text();
        var dato5 = fila.find("td:eq(5)").text();
        var dato6 = fila.find("td:eq(6)").text();
        var dato7 = fila.find("td:eq(7)").text();
        // Obtén más datos según la cantidad de columnas que tengas
        datos.push({
          dato1: dato1,
          dato2: dato2,
          dato3: dato3,
          dato4: dato4,
          dato5: dato5,
          dato6: dato6,
          dato7: dato7,
        });
      });
      return datos;
    }

    function enviarDatosAlControlador(datos) {
      $.ajax({
        url: "/App/Http/Controllers/RegistroComprobanteController;",
        method: "POST",
        data: { datos: datos },
        success: function (response) {
            alert("Datos agregados a la tabla");// Hacer algo con la respuesta del servidor (opcional)
        },
        error: function (error) {
            alerta()// Manejar el error en caso de que ocurra (opcional)
        },
      });
    }
  });




var cont=0;
totalCargo=0;
totalAbono=0;

subtotal=[];
subTotalCargo=[];
subTotalAbono=[];

$("#guardar").hide();

function agregar() {

    idcuenta_contable=$("#cuenta_contable").val();
    cuenta_contable=$("#cuenta_contable option:selected").text();
    codigo_cuenta=$("#codigo_cuenta").val();
    nombre_cuenta=$("#nombre_cuenta").val();
    concepto=$("#concepto").val();
    cargo=$("#cargo").val();
    abono=$("#abono").val();

    //CONDICIONAL
    if (idcuenta_contable!="" && codigo_cuenta!="" && nombre_cuenta!="" && concepto!="" && cargo!="" && abono!="") {

        //SUMA DE LOS VALORESDE LA CELDA CARGO
        subTotalCargo[cont]=cargo++;
        totalCargo=totalCargo+subTotalCargo[cont];

        //SUMA DE LOS VALORESDE LA CELDA ABONO
        subTotalAbono[cont]=abono++;
        totalAbono=totalAbono+subTotalAbono[cont];

        // // CONSTRUCCIÓN DE FILAS Y COLUMNAS
        //var fila=`<tr class="selected" id="fila${cont}"><td><button type="button" class="btn btn-warning" onclick="eliminar(${cont});">X</button></td><td><input type="hidden" name="idcuenta_contable[]" value=${idcuenta_contable}>${cuenta_contable}</td><td><input type="hidden" name="codigo_cuenta[]" value=${codigo_cuenta}>${codigo_cuenta}</td><td><input type="hidden" name="nombre_cuenta[]" value=${nombre_cuenta}>${nombre_cuenta}</td><td><input type="hidden" name="concepto[]" value=${concepto}>${concepto}</td><td><input disabled type="number" name="cargo[]" value=${subTotalCargo[cont]}></td><td><input disabled type="number" name="abono[]" value=${subTotalAbono[cont]}></td></tr>`;
        //cont++;

        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name"idcuenta_contable[]" value="'+idcuenta_contable+'">'+cuenta_contable+'</td><td><input type="text" name"codigo_cuenta[]" value="'+codigo_cuenta+'"></td><td><input type="text" name"nombre_cuenta[]" value="'+nombre_cuenta+'"></td><td><input type="text" name"concepto[]" value="'+concepto+'"></td><td>'+subTotalCargo[cont]+'</td><td>'+subTotalAbono[cont]+'</td></tr>';
        cont++;


        // var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idcuenta_contable[]" value="'+idcuenta_contable+'">'+cuenta_contable+'</td><td><input type="text" name="codigo_cuenta[]" value="'+codigo_cuenta+'"></td><td><input type="text" name="nombre_cuenta[]" value="'+nombre_cuenta+'"></td><td><input type="text" name="concepto[]" value="'+concepto+'"></td><td>'+subTotalCargo[cont]+'</td><td>'+subTotalAbono[cont]+'</td></tr>';
        // cont++;


        limpiar();
        $("#totalCargo").html("Q/. " + totalCargo);
        $("#totalAbono").html("Q/. " + totalAbono);
        evaluar();
        $("#detalles").append(fila);
    }
    else
    {
        // alert("Error al ingresar el detalle, revise los datos");
        alerta();

    }

}

//SIRVE PARA LIMPIAR LOS CAMPOS UTILIZADOS
function limpiar()
{
    $("#codigo_cuenta").val("");
    $("#nombre_cuenta").val("");
    $("#concepto").val("");
    $("#cargo").val("");
    $("#abono").val("");
}

function evaluar()
{
    if((totalCargo>0 && totalAbono>0) && totalCargo==totalAbono)
    {
        $("#guardar").show();
    }
    else
    {
        $("#guardar").hide();
    }

}

    function eliminar(datosFila)
{
    totalCargo=totalCargo-subTotalCargo[datosFila];
    totalAbono=totalAbono-subTotalAbono[datosFila];
    $("#totalCargo").html("Q/. " + totalCargo);
    $("#totalAbono").html("Q/. " + totalAbono);
    $("#fila" + datosFila).remove();
    evaluar();
}

function alerta(){

    Swal.fire({
        title: 'Error al ingresar el detalle a la tabla',
        text: "¡Revise los datos!",
        icon: 'error',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
      })
    //   .then((result) => {
        // if (result.isConfirmed) {
        //   Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        //   )
        // }
    //   })
}
