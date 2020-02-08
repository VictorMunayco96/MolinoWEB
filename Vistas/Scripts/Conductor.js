var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})


}



function limpiar(){

    $("#IdConductor").val("");
$("#CodConduc").val("");
$("#DNI").val("");
$("#Licencia").val("");
$("#Nombre").val("");
$("#Apellidos").val("");
$("#Nacionalidad").val("");
$("#TipoBrevete").val("");
$("#Condicion").val("");
$("#Observacion").val("");


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

        url: '../Ajax/AConductor.php?Op=Listar',
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

url: "../Ajax/AConductor.php?Op=GuardaryEditar",
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

function Mostrar(IdConductor)
{

    
    $.post("../Ajax/AConductor.php?Op=Mostrar",{IdConductor : IdConductor}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#Condicion").val(data.Condicion);
            $("#Condicion").selectpicker('refresh');
            $("#IdConductor").val(data.IdConductor);
            $("#CodConduc").val(data.CodConduc);
            $("#DNI").val(data.DNI);
            $("#Licencia").val(data.Licencia);
            $("#Nombre").val(data.Nombre);
            $("#Apellidos").val(data.Apellidos);
            $("#Nacionalidad").val(data.Nacionalidad);
            $("#Nacionalidad").selectpicker('refresh');
            $("#TipoBrevete").val(data.TipoBrevete);
            $("#TipoBrevete").selectpicker('refresh');
            $("#Observacion").val(data.Observacion);
            

         




})


}

function Desactivar(IdConductor){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL CONDUCTOR?", function(result){

if(result){

    $.post("../Ajax/AConductor.php?Op=Desactivar",{IdConductor : IdConductor}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdConductor){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL CONDUCTOR?", function(result){
    
    if(result){
    
        $.post("../Ajax/AConductor.php?Op=Activar",{IdConductor : IdConductor}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();