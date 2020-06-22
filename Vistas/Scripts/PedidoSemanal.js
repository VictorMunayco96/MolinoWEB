var tabla;
var tablaP;

function init(){

MostrarForm(1);
ListarCabeceraPedido();
limpiar();
$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})


$.post("../Ajax/APedidoSemanal.php?Op=SelectDescProd", function(r){

    $("#IdDescProd").html(r);
    $('#IdDescProd').selectpicker('refresh');
    
    
    
    });



        
    




}
function limpiar(){

    $("#IdPedido").val("");
$("#CantidadKG").val("");
$("#Observacion").val("");
$("#CantidadBatch").val("");
$("#Motivo").val("SELECCIONAR");
$("#Motivo").selectpicker('refresh');
IdDestinoBloq.disabled=false;


}

function Mostrar(IdPedidoSemanal)
{

    
    $.post("../Ajax/APedidoSemanal.php?Op=Mostrar",{IdPedidoSemanal : IdPedidoSemanal}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(3);

            $("#IdPedidoSemanal").val(data.IdPedidoSemanal);
            $("#IdCabeceraPedido").val(data.IdCabeceraPedido);
            $("#IdCabeceraPedido").selectpicker('refresh');
            $("#IdDescProd").val(data.IdDescProd);
            $("#IdDescProd").selectpicker('refresh');
           
            $("#CantidadBatch").val(data.CantidadBatch);
            $("#CantidadKG").val(data.CantidadKG);
            $("#Observacion").val(data.Observacion);


            $.post("../Ajax/APedidoSemanal.php?Op=SelectBloqDesc&IdCabeceraPedido="+data.IdCabeceraPedido, function(r){

                $("#IdDestinoBloq").html(r);
                $('#IdDestinoBloq').selectpicker('refresh');
                
                
                
                });


          
            $("#IdDestinoBloq").val(data.IdDestinoBloq);
            $("#IdDestinoBloq").selectpicker('refresh');
            
            IdDestinoBloq.disabled=true;


          



         




})


}






function AgregarPedidoSemanal(IdCabeceraPedido)
{

    $.post("../Ajax/APedidoSemanal.php?Op=SelectBloqDesc&IdCabeceraPedido="+IdCabeceraPedido, function(r){

        $("#IdDestinoBloq").html(r);
        $('#IdDestinoBloq').selectpicker('refresh');
        
        
        
        });

        $("#IdCabeceraPedido").val(IdCabeceraPedido);


        MostrarForm(3);


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

        url: '../Ajax/APedidoSemanal.php?Op=ListarCabeceraPedido',
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

url: "../Ajax/APedidoSemanal.php?Op=GuardaryEditar",
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

        url: '../Ajax/APedidoSemanal.php?Op=ListarPedidoSemanal&IdCabeceraPedido='+Hola,
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

function Desactivar(IdPedidoSemanal){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL PEDIDO?", function(result){

if(result){

    $.post("../Ajax/APedidoSemanal.php?Op=Desactivar",{IdPedidoSemanal : IdPedidoSemanal}, function(e){

        bootbox.alert(e);
        tablaP.ajax.reload();
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdPedidoSemanal){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL PEDIDO?", function(result){
    
    if(result){
    
        $.post("../Ajax/APedidoSemanal.php?Op=Activar",{IdPedidoSemanal : IdPedidoSemanal}, function(e){
    
            bootbox.alert(e);
            tablaP.ajax.reload();
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }

    function Aceptar(IdPedidoSemanal){

        bootbox.confirm("¿ESTA SEGURO DE ACEPTAR EL PEDIDO?", function(result){
        
        if(result){
        
            $.post("../Ajax/APedidoSemanal.php?Op=Aceptar",{IdPedidoSemanal : IdPedidoSemanal}, function(e){
        
                bootbox.alert(e);
                tablaP.ajax.reload();
                tabla.ajax.reload();
        
            });
        
        
        }
        
        })
        
        
        }

        function Rechazar(IdPedidoSemanal){

            bootbox.confirm("¿ESTA SEGURO DE RECHAZAR EL PEDIDO?", function(result){
            
            if(result){
            
                $.post("../Ajax/APedidoSemanal.php?Op=Rechazar",{IdPedidoSemanal : IdPedidoSemanal}, function(e){
            
                    bootbox.alert(e);
                    tablaP.ajax.reload();
                    tabla.ajax.reload();
            
                });
            
            
            }
            
            })
            
            
            }



init();