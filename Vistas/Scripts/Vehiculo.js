var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/AVehiculo.php?Op=SelectEmpreTrans", function(r){

$("#IdEmpreTrans").html(r);
$('#IdEmpreTrans').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdPlaca").val("");
$("#Placa").val("");
$("#Marca").val("");
$("#Compartimientos").val("");


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

        url: '../Ajax/AVehiculo.php?Op=Listar',
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

url: "../Ajax/AVehiculo.php?Op=GuardaryEditar",
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

function Mostrar(IdPlaca)
{

    
    $.post("../Ajax/AVehiculo.php?Op=Mostrar",{IdPlaca : IdPlaca}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdEmpreTrans").val(data.IdEmpreTrans);
            $("#IdEmpreTrans").selectpicker('refresh');
            $("#Placa").val(data.Placa);
            $("#Marca").val(data.Marca);
            $("#Compartimientos").val(data.Compartimientos);
            $("#IdPlaca").val(data.IdPlaca);
        

         




})


}

function Desactivar(IdPlaca){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL VEHICULO?", function(result){

if(result){

    $.post("../Ajax/AVehiculo.php?Op=Desactivar",{IdPlaca : IdPlaca}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdPlaca){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL VEHICULO?", function(result){
    
    if(result){
    
        $.post("../Ajax/AVehiculo.php?Op=Activar",{IdPlaca : IdPlaca}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();