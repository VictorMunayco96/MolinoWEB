var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})


}



function limpiar(){

    $("#IdEstadoPlanta").val("");
$("#EstadoPlanta").val("SELECCIONAR");
$('#EstadoPlanta').selectpicker('refresh');
$("#Tema").val("SELECCIONAR");
$('#Tema').selectpicker('refresh');
$("#Detalle").val("");



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

        url: '../Ajax/AEstadoPlanta.php?Op=Listar',
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


    $.post("../Ajax/AEstadoPlanta.php?Op=ActualizarHoraFin");





e.preventDefault();
$("#BtnGuardar").prop("disabled",true);
var formData= new FormData($("#Formulario")[0]);

$.ajax({

url: "../Ajax/AEstadoPlanta.php?Op=GuardaryEditar",
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

function Mostrar(IdEstadoPlanta)
{

    
    $.post("../Ajax/AEstadoPlanta.php?Op=Mostrar",{IdEstadoPlanta : IdEstadoPlanta}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

        


            $("#IdEstadoPlanta").val(data.IdEstadoPlanta);
            $("#EstadoPlanta").val(data.EstadoPlanta);
            $('#EstadoPlanta').selectpicker('refresh');
            $("#Tema").val(data.Tema);
            $('#Tema').selectpicker('refresh');
            $("#Detalle").val(data.Detalle);
            

         




})


}

function Desactivar(IdEstadoPlanta){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR LE REGISTRO?", function(result){

if(result){

    $.post("../Ajax/AEstadoPlanta.php?Op=Desactivar",{IdEstadoPlanta : IdEstadoPlanta}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdEstadoPlanta){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL REGISTRO?", function(result){
    
    if(result){
    
        $.post("../Ajax/AEstadoPlanta.php?Op=Activar",{IdEstadoPlanta : IdEstadoPlanta}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();