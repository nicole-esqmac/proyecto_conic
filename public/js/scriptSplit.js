$("#idClaseCuenta").change(mostrarClaseCuenta);

function mostrarClaseCuenta()
{
   const datos=document.getElementById('idClaseCuenta').value.split('_');
    $("#nombreClaseCuenta").val(datos[2]);
    $("#codigoClaseCuenta").val(datos[1]);
    $("#id_ClaseCuenta").val(datos[0]);

}

$("#idGrupoCuenta").change(mostrarGrupoCuenta);

function mostrarGrupoCuenta()
{
   const datos=document.getElementById('idGrupoCuenta').value.split('_');
    $("#nombreGrupoCuenta").val(datos[2]);
    $("#codigoGrupoCuenta").val(datos[1]);
    $("#id_GrupoCuenta").val(datos[0]);

}
