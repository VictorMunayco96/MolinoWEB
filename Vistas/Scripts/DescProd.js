var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/ADescProd.php?Op=SelectProducto", function(r){

$("#IdProducto").html(r);
$('#IdProducto').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdDescProd").val("");
$("#DescProd").val("");
$("#CodDescProd").val("");


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

        url: '../Ajax/ADescProd.php?Op=Listar',
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

url: "../Ajax/ADescProd.php?Op=GuardaryEditar",
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

function Mostrar(IdDescProd)
{

    
    $.post("../Ajax/ADescProd.php?Op=Mostrar",{IdDescProd : IdDescProd}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdProducto").val(data.IdProducto);
            $("#IdProducto").selectpicker('refresh');
            $("#DescProd").val(data.DescProd);
            $("#CodDescProd").val(data.CodDescProd);
            $("#IdDescProd").val(data.IdDescProd);
        
        

         




})


}

function Desactivar(IdDescProd){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR LA DESCRIPCION DEL PRODUCTO?", function(result){

if(result){

    $.post("../Ajax/ADescProd.php?Op=Desactivar",{IdDescProd : IdDescProd}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdDescProd){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR LA DESCRIPCION DEL PRODUCTO?", function(result){
    
    if(result){
    
        $.post("../Ajax/ADescProd.php?Op=Activar",{IdDescProd : IdDescProd}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();