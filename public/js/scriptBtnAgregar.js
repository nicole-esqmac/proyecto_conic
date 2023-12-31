$(document).ready(function(){
    $("#btn_add").click(function(){
        agregar();
    });
});

var cont=0;
totalCargo=0;
totalAbono=0;

subtotal=[];
subTotalCargo=[];
subTotalAbono=[];

$("#guardar").hide();
$("#cuentaContable").change(mostrarValores);

function mostrarValores()
{
   const datos=document.getElementById('cuentaContable').value.split('_');
    $("#nombre_cuenta").val(datos[2]);
    $("#codigo_cuenta").val(datos[1]);

}

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
