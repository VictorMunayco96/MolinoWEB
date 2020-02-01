var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/ADestino.php?Op=SelectTipoDestino", function(r){

$("#IdTipoDestino").html(r);
$('#IdTipoDestino').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdDestino").val("");
$("#Destino").val("");
$("#CodDestino").val("");


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

        url: '../Ajax/ADestino.php?Op=Listar',
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

url: "../Ajax/ADestino.php?Op=GuardaryEditar",
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

function Mostrar(IdDestino)
{

    
    $.post("../Ajax/ADestino.php?Op=Mostrar",{IdDestino : IdDestino}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdTipoDestino").val(data.IdTipoDestino);
            $("#IdTipoDestino").selectpicker('refresh');
            $("#Destino").val(data.Destino);
            $("#CodDestino").val(data.CodDestino);
            $("#IdDestino").val(data.IdDestino);
            

         




})


}

function Desactivar(IdDestino){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL DESTINO?", function(result){

if(result){

    $.post("../Ajax/ADestino.php?Op=Desactivar",{IdDestino : IdDestino}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdDestino){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL DESTINO?", function(result){
    
    if(result){
    
        $.post("../Ajax/ADestino.php?Op=Activar",{IdDestino : IdDestino}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();