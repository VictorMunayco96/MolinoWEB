var tabla;
var tablaP;
var tablaPE;

function init(){

MostrarForm(1);
ListarCabeceraPedido();
limpiar();
$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})






        
    




}
function limpiar(){

    $("#IdPedido").val("");
$("#IdPedidoSemanal").val("");
$("#CantidadBatch").val("");
$("#Detalle").val("");
$("#TipoTransporte").val("SELECCIONAR");
$("#TipoTransporte").selectpicker('refresh');
$("#CantidadKG").val("");

}

function Mostrar(IdPedido)
{

    
    $.post("../Ajax/APedido.php?Op=Mostrar",{IdPedido : IdPedido}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(3);

            $("#IdPedido").val(data.IdPedido);
            $("#CantidadBatch").val(data.CantidadBatch);
            $("#Observacion").val(data.Observacion);
            $("#CantidadKG").val(data.CantidadKG);
            $("#TipoTransporte").val(data.TipoTransporte);
            $("#TipoTransporte").selectpicker('refresh');
            $("#IdPedidoSemanal").val(data.IdPedidoSemanal);
        
            $("#Detalle").val(data.Detalle);

           

         




})


}



function AgregarPedido(IdPedidoSemanal)
{
    MostrarForm(3);

        $("#IdPedidoSemanal").val(IdPedidoSemanal);


        


}









function MostrarForm($Ventana){

    limpiar();
    if ($Ventana==1){
    
    $("#ListadoCabecera").show();
    $("#FormularioRegistros").hide();
    $("#ListadoPedidoSemanal").hide();
    $("#ListadoPedido").hide();
    $("#BtnGuardar").prop("disabled",false);
    
    
    }

    if ($Ventana==2){
    
        $("#ListadoCabecera").hide();
        $("#FormularioRegistros").hide();
        $("#ListadoPedidoSemanal").show();
        $("#ListadoPedido").hide();
        $("#BtnGuardar").prop("disabled",false);
        
        
        }

        if ($Ventana==3){
    
            $("#ListadoCabecera").hide();
            $("#FormularioRegistros").show();
            $("#ListadoPedidoSemanal").hide();
            $("#ListadoPedido").hide();
            $("#BtnGuardar").prop("disabled",false);
            
            
            }

            if ($Ventana==4){
    
                $("#ListadoCabecera").hide();
                $("#FormularioRegistros").hide();
                $("#ListadoPedidoSemanal").hide();
                $("#ListadoPedido").show();
                $("#BtnGuardar").prop("disabled",false);
                
                
                }
            

        

    

}



function CancelarForm(){

    limpiar();
    MostrarForm(1);
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
    "iDisplayLength":10,
    "order":[[0,"desc"]]

}).DataTable();

}

function GuardaryEditar(e){

e.preventDefault();
$("#BtnGuardar").prop("disabled",true);
var formData= new FormData($("#Formulario")[0]);

$.ajax({

url: "../Ajax/APedido.php?Op=GuardaryEditar",
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

function ListarPedidoSemanal(IdCabeceraPedido)
{
   MostrarForm(2);

var Hola = IdCabeceraPedido;
   
tablaP=$("#tbllistadoPS").dataTable(
    
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

        url: '../Ajax/APedido.php?Op=ListarPedidoSemanal&IdCabeceraPedido='+Hola,
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


function ListarPedido(IdPedidoSemanal)
{
   MostrarForm(4);

var Hola = IdPedidoSemanal;
   
tablaPE=$("#tbllistadoPE").dataTable(
    
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

        url: '../Ajax/APedido.php?Op=ListarPedido&IdPedidoSemanal='+Hola,
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
        tablaPE.ajax.reload();

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
            tablaPE.ajax.reload();
    
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
                tablaPE.ajax.reload();

        
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
                    tablaPE.ajax.reload();
            
                });
            
            
            }
            
            })
            
            
            }



init();