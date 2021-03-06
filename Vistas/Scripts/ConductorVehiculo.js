var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/AConductorVehiculo.php?Op=SelectVehiculo", function(r){

$("#IdPlaca").html(r);
$('#IdPlaca').selectpicker('refresh');



});


$.post("../Ajax/AConductorVehiculo.php?Op=SelectConductor", function(r){

    $("#IdConductor").html(r);
    $('#IdConductor').selectpicker('refresh');
    
    
    
    });


}



function limpiar(){

    $("#IdConductorVehiculo").val("");
    

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

        url: '../Ajax/AConductorVehiculo.php?Op=Listar',
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

url: "../Ajax/AConductorVehiculo.php?Op=GuardaryEditar",
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

function Mostrar(IdConductorVehiculo)
{

    
    $.post("../Ajax/AConductorVehiculo.php?Op=Mostrar",{IdConductorVehiculo : IdConductorVehiculo}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdPlaca").val(data.IdPlaca);
            $("#IdPlaca").selectpicker('refresh');
            
            $("#IdConductor").val(data.IdConductor);
            $("#IdConductor").selectpicker('refresh');
            
            
            
           
            

         




})


}

function Desactivar(IdConductorVehiculo){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR?", function(result){

if(result){

    $.post("../Ajax/AConductorVehiculo.php?Op=Desactivar",{IdConductorVehiculo : IdConductorVehiculo}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdConductorVehiculo){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR?", function(result){
    
    if(result){
    
        $.post("../Ajax/AConductorVehiculo.php?Op=Activar",{IdConductorVehiculo : IdConductorVehiculo}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();