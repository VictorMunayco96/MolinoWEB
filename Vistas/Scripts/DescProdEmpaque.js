var tabla;

function init(){

MostrarForm(false);
Listar();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/ADescProdEmpaque.php?Op=SelectDescProd", function(r){

$("#IdDescProd").html(r);
$('#IdDescProd').selectpicker('refresh');



});




}
function limpiar(){

    $("#IdDescProd").val("");
$("#IdDescProdEmpaque").val("");
$("#Presentacion").val("");
$("#Paquete").val("");
$("#Unidad").val("");


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

        url: '../Ajax/ADescProdEmpaque.php?Op=Listar',
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

url: "../Ajax/ADescProdEmpaque.php?Op=GuardaryEditar",
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

function Mostrar(IdDescProdEmpaque)
{

    
    $.post("../Ajax/ADescProdEmpaque.php?Op=Mostrar",{IdDescProdEmpaque : IdDescProdEmpaque}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(true);

            $("#IdDescProdEmpaque").val(data.IdDescProdEmpaque);
            $("#IdDescProd").val(data.IdDescProd);
            $("#IdDescProd").selectpicker('refresh');
            $("#Presentacion").val(data.Presentacion);
            $("#Paquete").val(data.Paquete);
            $("#Unidad").val(data.Unidad);
        
        

         




})


}

function Desactivar(IdDescProdEmpaque){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR LA DESCRIPCION DEL PRODUCTO?", function(result){

if(result){

    $.post("../Ajax/ADescProdEmpaque.php?Op=Desactivar",{IdDescProdEmpaque : IdDescProdEmpaque}, function(e){

        bootbox.alert(e);
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdDescProdEmpaque){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR LA DESCRIPCION DEL PRODUCTO?", function(result){
    
    if(result){
    
        $.post("../Ajax/ADescProdEmpaque.php?Op=Activar",{IdDescProdEmpaque : IdDescProdEmpaque}, function(e){
    
            bootbox.alert(e);
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }


init();