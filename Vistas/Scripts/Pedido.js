var tabla;
var tablaP;

function init(){

MostrarForm(1);
ListarCabeceraPedido();

$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})


$.post("../Ajax/APedido.php?Op=SelectDescProd", function(r){

    $("#IdDescProd").html(r);
    $('#IdDescProd').selectpicker('refresh');
    
    
    
    });


    $.post("../Ajax/APedido.php?Op=SelectCabeceraPedido", function(r){

        $("#IdCabeceraPedido").html(r);
        $('#IdCabeceraPedido').selectpicker('refresh');
        
        
        
        });
        
    




}
function limpiar(){

    $("#IdProducto").val("");
$("#Producto").val("");
$("#CodProducto").val("");
$("#NombreGuia").val("");


}



function MostrarForm($Ventana){

    limpiar();
    if ($Ventana==1){
    
    $("#ListadoCabecera").show();
    $("#FormularioRegistros").hide();
    $("#ListadoPedido").hide();
    $("#BtnGuardar").prop("disabled",false);
    
    
    }

    if ($Ventana==2){
    
        $("#ListadoCabecera").hide();
        $("#FormularioRegistros").hide();
        $("#ListadoPedido").show();
        $("#BtnGuardar").prop("disabled",false);
        
        
        }

        if ($Ventana==3){
    
            $("#ListadoCabecera").hide();
            $("#FormularioRegistros").show();
            $("#ListadoPedido").hide();
            $("#BtnGuardar").prop("disabled",false);
            
            
            }
        

    

}



function CancelarForm(){

    limpiar();
    MostrarForm(false);
}

function ListarCabeceraPedido(){

tabla=$("#tbllistadoC").dataTable(
    
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

        url: '../Ajax/APedido.php?Op=ListarCabeceraPedido',
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

function ListarPedido(IdCabeceraPedido)
{
   MostrarForm(2);

var Hola = IdCabeceraPedido;
   
tablaP=$("#tbllistadoP").dataTable(
    
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

        url: '../Ajax/APedido.php?Op=ListarPedido&IdCabeceraPedido='+Hola,
        //data:{IdCabeceraPedido:Hola},
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