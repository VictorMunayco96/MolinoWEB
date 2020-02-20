var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})


}
function limpiar(){

    $("#IdEmpleado").val("");
$("#DNI").val("");
$("#Codigo").val("");
$("#NombreE").val("");
$("#ApellidosE").val("");
$("#Telefono").val("");
$("#Celular").val("");
$("#FechaIngreso").val("");

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

        url: '../Ajax/AEmpleado.php?Op=Listar',
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

url: "../Ajax/AEmpleado.php?Op=GuardaryEditar",
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

function Mostrar(IdEmpleado)
{

    
    $.post("../Ajax/AEmpleado.php?Op=Mostrar",{IdEmpleado : IdEmpleado}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdEmpleado").val(data.IdEmpleado);
            $("#DNI").val(data.DNI);
            $("#Codigo").val(data.Codigo);
            $("#NombreE").val(data.NombreE);
            $("#ApellidosE").val(data.ApellidosE);
            $("#Telefono").val(data.Telefono);
            $("#Celular").val(data.Celular);
            $("#FechaIngreso").val(data.FechaIngreso);



})


}

function Desactivar(IdEmpleado){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL EMPLEADO?", function(result){

if(result){

    $.post("../Ajax/AEmpleado.php?Op=Desactivar",{IdEmpleado : IdEmpleado}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdEmpleado){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL EMPLEADO?", function(result){
        
    if(result){
    
        $.post("../Ajax/AEmpleado.php?Op=Activar",{IdEmpleado : IdEmpleado}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();

