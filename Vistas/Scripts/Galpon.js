var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/AGalpon.php?Op=SelectDestinoBloq", function(r){

$("#IdDestinoBloq").html(r);
$('#IdDestinoBloq').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdGalpon").val("");
$("#Galpon").val("");
$("#CodGalpon").val("");


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

        url: '../Ajax/AGalpon.php?Op=Listar',
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

url: "../Ajax/AGalpon.php?Op=GuardaryEditar",
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

function Mostrar(IdGalpon)
{

    
    $.post("../Ajax/AGalpon.php?Op=Mostrar",{IdGalpon : IdGalpon}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdDestinoBloq").val(data.IdDestinoBloq);
            $("#IdDestinoBloq").selectpicker('refresh');
            $("#Galpon").val(data.Galpon);
            $("#CodGalpon").val(data.CodGalpon);
            $("#IdGalpon").val(data.IdGalpon);
            

         




})


}

function Desactivar(IdGalpon){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL GALPON?", function(result){

if(result){

    $.post("../Ajax/AGalpon.php?Op=Desactivar",{IdGalpon : IdGalpon}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdGalpon){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL GALPON?", function(result){
    
    if(result){
    
        $.post("../Ajax/AGalpon.php?Op=Activar",{IdGalpon : IdGalpon}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();