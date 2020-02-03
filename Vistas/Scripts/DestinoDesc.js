var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/ADestinoDesc.php?Op=SelectDestino", function(r){

$("#IdDestino").html(r);
$('#IdDestino').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdDestinoDesc").val("");
$("#DestinoDes").val("");
$("#CodDestinoDesc").val("");


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

        url: '../Ajax/ADestinoDesc.php?Op=Listar',
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

url: "../Ajax/ADestinoDesc.php?Op=GuardaryEditar",
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

function Mostrar(IdDestinoDesc)
{

    
    $.post("../Ajax/ADestinoDesc.php?Op=Mostrar",{IdDestinoDesc : IdDestinoDesc}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdDestino").val(data.IdDestino);
            $("#IdDestino").selectpicker('refresh');
            $("#DestinoDes").val(data.DestinoDes);
            $("#CodDestinoDesc").val(data.CodDestinoDesc);
            $("#IdDestinoDesc").val(data.IdDestinoDesc);
            

         




})


}

function Desactivar(IdDestinoDesc){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR LA DESCRIPCION DESTINO?", function(result){

if(result){

    $.post("../Ajax/ADestinoDesc.php?Op=Desactivar",{IdDestinoDesc : IdDestinoDesc}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdDestinoDesc){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR LA DESCRIPCION DEL DESTINO?", function(result){
    
    if(result){
    
        $.post("../Ajax/ADestinoDesc.php?Op=Activar",{IdDestinoDesc : IdDestinoDesc}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();