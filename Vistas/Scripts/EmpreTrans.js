var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})


}



function limpiar(){

    $("#IdEmpreTrans").val("");
$("#RUC").val("");
$("#RazonSocial").val("");
$("#Domicilio").val("");
$("#Correo").val("");
$("#NumCel").val("");
$("#Condicion").val("");
$("#Observ").val("");


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

        url: '../Ajax/AEmpreTrans.php?Op=Listar',
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

url: "../Ajax/AEmpreTrans.php?Op=GuardaryEditar",
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

function Mostrar(IdEmpreTrans)
{

    
    $.post("../Ajax/AEmpreTrans.php?Op=Mostrar",{IdEmpreTrans : IdEmpreTrans}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#Condicion").val(data.Condicion);
            $("#Condicion").selectpicker('refresh');
            $("#IdEmpreTrans").val(data.IdEmpreTrans);
            $("#RUC").val(data.Ruc);
            $("#RazonSocial").val(data.RazonSocial);
            $("#Domicilio").val(data.Domicilio);
            $("#Correo").val(data.Correo);
            $("#NumCel").val(data.NumCel);
            $("#Observ").val(data.Observ);
            

         




})


}

function Desactivar(IdEmpreTrans){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR LA EMPRESA TRANSPORTISTA?", function(result){

if(result){

    $.post("../Ajax/AEmpreTrans.php?Op=Desactivar",{IdEmpreTrans : IdEmpreTrans}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdEmpreTrans){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR LA EMPRESA TRANSPORTISTA?", function(result){
    
    if(result){
    
        $.post("../Ajax/AEmpreTrans.php?Op=Activar",{IdEmpreTrans : IdEmpreTrans}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();