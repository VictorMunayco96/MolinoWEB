var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/ADestinoBloq.php?Op=SelectDestinoDesc", function(r){

$("#IdDestinoDesc").html(r);
$('#IdDestinoDesc').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdDestinoBloq").val("");
$("#DestinoBloq").val("");
$("#CodDestinoBloq").val("");


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

url: "../Ajax/ADestinoBloq.php?Op=GuardaryEditar",
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

function Mostrar(IdDestinoBloq)
{

    
    $.post("../Ajax/ADestinoBloq.php?Op=Mostrar",{IdDestinoBloq : IdDestinoBloq}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdDestinoDesc").val(data.IdDestinoDesc);
            $("#IdDestinoDesc").selectpicker('refresh');
            $("#DestinoBloq").val(data.DestinoBloq);
            $("#CodDestinoBloq").val(data.CodDestinoBloq);
            $("#IdDestinoBloq").val(data.IdDestinoBloq);
            

         




})


}

function Desactivar(IdDestinoBloq){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL BLOQUE?", function(result){

if(result){

    $.post("../Ajax/ADestinoBloq.php?Op=Desactivar",{IdDestinoBloq : IdDestinoBloq}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdDestinoBloq){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL BLOQUE?", function(result){
    
    if(result){
    
        $.post("../Ajax/ADestinoBloq.php?Op=Activar",{IdDestinoBloq : IdDestinoBloq}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();