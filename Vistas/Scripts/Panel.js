var tabla;
var tablaP;
var tablaPA;

function init(){
  

MostrarForm(1);
ListarCabeceraPedido();


$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



        
    




}
function limpiar(){

    $("#IdPedido").val("");
$("#IdPanel").val("");
$("#PesoPanel").val("");
$("#CantidadBatch").val("");
$("#CodProduccion").val("");


}

function MostrarPedido(IdPedido)
{

    
    $.post("../Ajax/APanel.php?Op=MostrarPedido",{IdPedido : IdPedido}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(3);

        $("#IdPedido").val(data.IdPedido);

        
           
            




         




})


}



function MostrarForm($Ventana){

    limpiar();
    if ($Ventana==1){
    
    $("#ListadoCabecera").show();
    $("#FormularioRegistros").hide();
    $("#ListadoPedido").hide();
    $("#BtnGuardar").prop("disabled",false);
    $("#ListadoPanel").hide();
        
    
    }

    if ($Ventana==2){
    
    $("#ListadoCabecera").hide();
    $("#FormularioRegistros").hide();
    $("#ListadoPedido").show();
    $("#BtnGuardar").prop("disabled",false);
    $("#ListadoPanel").hide();
            
        
        }

    if ($Ventana==3){
    
        $("#ListadoPanel").hide();
    $("#ListadoCabecera").hide();
    $("#FormularioRegistros").show();
    $("#ListadoPedido").hide();
    $("#BtnGuardar").prop("disabled",false);
    
            
            }

            if ($Ventana==4){
    $("#ListadoPanel").show();
    $("#ListadoCabecera").hide();
    $("#FormularioRegistros").hide();
    $("#ListadoPedido").hide();
    $("#BtnGuardar").prop("disabled",false);
                
    ListarPanel();
                
                }
        

    

}



function CancelarForm(){

    limpiar();
    MostrarForm(2);
}




function ListarCabeceraPedido(){


    MostrarForm(1);

var Hola = "AA";

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

        url: '../Ajax/APanel.php?Op=ListarCabeceraPedido',
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

url: "../Ajax/APanel.php?Op=GuardaryEditar",
type: "POST",
data: formData,
contentType: false,
processData: false,

success: function(datos){

    bootbox.alert(datos);
    MostrarForm(1);
    tabla.ajax.reload();

}


});

limpiar();

}




function ListarPanel()
{
 

tablaPA=$("#tbllistadoPA").dataTable(
    
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

        url: '../Ajax/APanel.php?Op=ListarPanel',
        
        type : "get",
        dataType :"json",
        error: function(e){
            console.log(e);
        }

    },
    "bDestroy":true,
    "iDisplayLength":5,
    "order":[[0,"desc"]]

}).DataTable(); 



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

        url: '../Ajax/APanel.php?Op=ListarPedido&IdCabeceraPedido='+Hola,
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

function Desactivar(IdPedido){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL PEDIDO?", function(result){

if(result){

    $.post("../Ajax/APedido.php?Op=Desactivar",{IdPedido : IdPedido}, function(e){

        bootbox.alert(e);
        tablaP.ajax.reload();
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdPedido){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL PEDIDO?", function(result){
    
    if(result){
    
        $.post("../Ajax/APedido.php?Op=Activar",{IdPedido : IdPedido}, function(e){
    
            bootbox.alert(e);
            tablaP.ajax.reload();
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }

    function Aceptar(IdPedido){

        bootbox.confirm("¿ESTA SEGURO DE ACEPTAR EL PEDIDO?", function(result){
        
        if(result){
        
            $.post("../Ajax/APedido.php?Op=Aceptar",{IdPedido : IdPedido}, function(e){
        
                bootbox.alert(e);
                tablaP.ajax.reload();
                tabla.ajax.reload();
        
            });
        
        
        }
        
        })
        
        
        }

        function Rechazar(IdPedido){

            bootbox.confirm("¿ESTA SEGURO DE RECHAZAR EL PEDIDO?", function(result){
            
            if(result){
            
                $.post("../Ajax/APedido.php?Op=Rechazar",{IdPedido : IdPedido}, function(e){
            
                    bootbox.alert(e);
                    tablaP.ajax.reload();
                    tabla.ajax.reload();
            
                });
            
            
            }
            
            })
            
            
            }



init();