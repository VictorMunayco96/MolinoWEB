var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/ACabeceraPedido.php?Op=SelectDestinoDesc", function(r){

$("#IdDestinoDesc").html(r);
$('#IdDestinoDesc').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdCabeceraPedido").val("");
$("#TipoTransporte").val("");
$("#OrdenEnvio").val("");


}

function MostrarForm(flag){

limpiar();
if (flag){

$("#ListadoRegistros").hide();
$("#FormularioRegistros").show();
$("#BtnGuardar").prop("disabled",false);


}else{

    $("#ListadoRegistros").show();
    $("#FormularioRegistros").hide();

}


}

function CancelarForm(){

    limpiar();
    MostrarForm(false);
}

function Listar(){

tabla=$("#tbllistado").dataTable(
    
    {
    "aProcessing": true,
    "aServerSide": true,
    dom: 'Bfrtip',
    buttons:[
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'


    ],

    "ajax":{

        url: '../Ajax/ACabeceraPedido.php?Op=Listar',
        type : "get",
        dataType :"json",
        error: function(e){
            console.log(e.responseText);
        }

    },
    "bDestroy":true,
    "iDisplayLength":5,
    "order":[[0,"desc"]]

}).DataTable();

}

function GuardaryEditar(e){

e.preventDefault();
$("#BtnGuardar").prop("disabled",true);
var formData= new FormData($("#Formulario")[0]);

$.ajax({

url: "../Ajax/ACabeceraPedido.php?Op=GuardaryEditar",
type: "POST",
data: formData,
contentType: false,
processData: false,

success: function(datos){

    bootbox.alert(datos);
    MostrarForm(false);
    tabla.ajax.reload();

}


});

limpiar();
}

function Mostrar(IdCabeceraPedido)
{

    
    $.post("../Ajax/ACabeceraPedido.php?Op=Mostrar",{IdCabeceraPedido : IdCabeceraPedido}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);


            $("#IdCabeceraPedido").val(data.IdCabeceraPedido);
            $("#IdDestinoDesc").val(data.IdDestinoDesc);
            $("#IdDestinoDesc").selectpicker('refresh');
            $("#TipoTransporte").val(data.TipoTransporte);
            $("#OrdenEnvio").val(data.OrdenEnvio);
            $("#TipoTransporte").val(data.TipoTransporte);
            $("#TipoTransporte").selectpicker('refresh');
            
        

         




})


}

function Desactivar(IdCabeceraPedido){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR LA DESCRIPCION DEL PRODUCTO?", function(result){

if(result){

    $.post("../Ajax/ACabeceraPedido.php?Op=Desactivar",{IdCabeceraPedido : IdCabeceraPedido}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdCabeceraPedido){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR LA DESCRIPCION DEL PRODUCTO?", function(result){
    
    if(result){
    
        $.post("../Ajax/ACabeceraPedido.php?Op=Activar",{IdCabeceraPedido : IdCabeceraPedido}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();