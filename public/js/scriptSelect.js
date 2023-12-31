$(document).ready(function(){
    $('.search_select_box select').selectpicker();
});

$("#idProyecto").change(mostrarValores);

function mostrarValores()
{
   const datos=document.getElementById('idProyecto').value.split('_');
    $("#descripcion").val(datos[1]);
    $("#id").val(datos[0]);

}
