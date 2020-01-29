var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/ACategoriaProd.php?Op=SelectTipoProducto", function(r){

$("#IdTipoProducto").html(r);
$('#IdTipoProducto').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdCategoriaProd").val("");
$("#CategoriaProd").val("");
$("#CodCategoria").val("");


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

        url: '../Ajax/ACategoriaProd.php?Op=Listar',
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

url: "../Ajax/ACategoriaProd.php?Op=GuardaryEditar",
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

function Mostrar(IdCategoriaProd)
{

    
    $.post("../Ajax/ACategoriaProd.php?Op=Mostrar",{IdCategoriaProd : IdCategoriaProd}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdTipoProducto").val(data.IdTipoProducto);
            $("#IdTipoProducto").selectpicker('refresh');
            $("#CategoriaProd").val(data.CategoriaProd);
            $("#CodCategoria").val(data.CodCategoria);
            $("#IdCategoriaProd").val(data.IdCategoriaProd);
        

         




})


}

function Desactivar(IdCategoriaProd){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR LA CATEGORIA PRODUCTO?", function(result){

if(result){

    $.post("../Ajax/ACategoriaProd.php?Op=Desactivar",{IdCategoriaProd : IdCategoriaProd}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdCategoriaProd){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR LA CATEGORIA PRODUCTO?", function(result){
    
    if(result){
    
        $.post("../Ajax/ACategoriaProd.php?Op=Activar",{IdCategoriaProd : IdCategoriaProd}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();
