var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})


}
function limpiar(){

    $("#IdTipoProducto").val("");
$("#TipoProducto").val("");
$("#CodTipoProducto").val("");

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

        url: '../Ajax/ATipoDestino.php?Op=Listar',
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

url: "../Ajax/ATipoDestino.php?Op=GuardaryEditar",
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

function Mostrar(IdTipoDestino)
{

    
    $.post("../Ajax/ATipoDestino.php?Op=Mostrar",{IdTipoDestino : IdTipoDestino}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#TipoDestino").val(data.TipoDestino);
            $("#CodDestino").val(data.CodDestino);
            $("#IdTipoDestino").val(data.IdTipoDestino);
        

         




})


}

function Desactivar(IdTipoDestino){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL TIPO DESTINO?", function(result){

if(result){

    $.post("../Ajax/ATipoDestino.php?Op=Desactivar",{IdTipoDestino : IdTipoDestino}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdTipoDestino){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL TIPO DESTINO?", function(result){
    
    if(result){
    
        $.post("../Ajax/ATipoDestino.php?Op=Activar",{IdTipoDestino : IdTipoDestino}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();

