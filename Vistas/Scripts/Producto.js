var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/AProducto.php?Op=SelectCategoriaProd", function(r){

$("#IdCategoriaProd").html(r);
$('#IdCategoriaProd').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdProducto").val("");
$("#Producto").val("");
$("#CodProducto").val("");
$("#NombreGuia").val("");


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

        url: '../Ajax/AProducto.php?Op=Listar',
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

url: "../Ajax/AProducto.php?Op=GuardaryEditar",
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

function Mostrar(IdProducto)
{

    
    $.post("../Ajax/AProducto.php?Op=Mostrar",{IdProducto : IdProducto}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdCategoriaProd").val(data.IdCategoriaProd);
            $("#IdCategoriaProd").selectpicker('refresh');
            $("#Producto").val(data.Producto);
            $("#CodProducto").val(data.CodProducto);
            $("#IdProducto").val(data.IdProducto);
            $("#NombreGuia").val(data.NombreGuia);
        

         




})


}

function Desactivar(IdProducto){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL PRODUCTO?", function(result){

if(result){

    $.post("../Ajax/AProducto.php?Op=Desactivar",{IdProducto : IdProducto}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdProducto){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL PRODUCTO?", function(result){
    
    if(result){
    
        $.post("../Ajax/AProducto.php?Op=Activar",{IdProducto : IdProducto}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();