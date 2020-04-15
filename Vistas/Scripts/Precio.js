var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/APrecio.php?Op=SelectDescProd", function(r){

$("#IdDescProd").html(r);
$('#IdDescProd').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdPrecio").val("");
$("#Precio").val("");


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

        url: '../Ajax/APrecio.php?Op=Listar',
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

url: "../Ajax/APrecio.php?Op=GuardaryEditar",
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

function Mostrar(IdPrecio)
{

    
    $.post("../Ajax/APrecio.php?Op=Mostrar",{IdPrecio : IdPrecio}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);
            $("#IdPrecio").val(data.IdPrecio);
            $("#IdDescProd").val(data.IdDescProd);
            $("#IdDescProd").selectpicker('refresh');
            $("#Precio").val(data.Precio);
         

         




})


}

function Desactivar(IdPrecio){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL REGISTRO?", function(result){

if(result){

    $.post("../Ajax/APrecio.php?Op=Desactivar",{IdPrecio : IdPrecio}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdPrecio){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL REGISTRO?", function(result){
    
    if(result){
    
        $.post("../Ajax/APrecio.php?Op=Activar",{IdPrecio : IdPrecio}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();