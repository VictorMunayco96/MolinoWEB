var tabla;
var tablaP;
var tablaVA;

function init(){

MostrarForm(1);
ListarCabeceraPedido();
limpiar();
$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})






        
    




}
function limpiar(){

    $("#IdVariaciones").val("");
$("#IdPedidoSemanal").val("");
$("#CantidadBatch").val("");
$("#Detalle").val("");
$("#Motivo").val("SELECCIONAR");
//$("#Motivo").selectpicker('refresh');


}

function Mostrar(IdVariaciones)
{

    
    $.post("../Ajax/AVariaciones.php?Op=Mostrar",{IdVariaciones : IdVariaciones}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(3);

            $("#IdVariaciones").val(data.IdVariaciones);
            $("#IdPedidoSemanal").val(data.IdPedidoSemanal);
            $("#CantidadBatch").val(data.CantidadBatch);
            $("#Motivo").val(data.Motivo);
            $("#Motivo").selectpicker('refresh');
           
        
            $("#Detalle").val(data.Detalle);

           

         




})


}



function AgregarVariacion(IdPedidoSemanal)
{
    MostrarForm(3);

        $("#IdPedidoSemanal").val(IdPedidoSemanal);


        


}









function MostrarForm($Ventana){

    limpiar();
    if ($Ventana==1){
    
    $("#ListadoCabecera").show();
    $("#FormularioRegistros").hide();
    $("#ListadoPedido").hide();
    $("#ListadoVariaciones").hide();
    $("#BtnGuardar").prop("disabled",false);
    
    
    }

    if ($Ventana==2){
    
        $("#ListadoCabecera").hide();
        $("#FormularioRegistros").hide();
        $("#ListadoPedido").show();
        $("#ListadoVariaciones").hide();
        $("#BtnGuardar").prop("disabled",false);
        
        
        }

        if ($Ventana==3){
    
            $("#ListadoCabecera").hide();
            $("#FormularioRegistros").show();
            $("#ListadoPedido").hide();
            $("#ListadoVariaciones").hide();
            $("#BtnGuardar").prop("disabled",false);
            
            
            }

            if ($Ventana==4){
    
                $("#ListadoCabecera").hide();
                $("#FormularioRegistros").hide();
                $("#ListadoPedido").hide();
                $("#ListadoVariaciones").show();
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

        url: '../Ajax/AVariaciones.php?Op=ListarCabeceraPedido',
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

url: "../Ajax/AVariaciones.php?Op=GuardaryEditar",
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

        url: '../Ajax/AVariaciones.php?Op=ListarPedidoSemanal&IdCabeceraPedido='+Hola,
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


function ListarVariaciones(IdPedidoSemanal)
{
   MostrarForm(4);

var Hola = IdPedidoSemanal;
   
tablaVA=$("#tbllistadoVA").dataTable(
    
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

        url: '../Ajax/AVariaciones.php?Op=ListarVariaciones&IdPedidoSemanal='+Hola,
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






function Desactivar(IdVariaciones){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR LA VARIACION?", function(result){

if(result){

    $.post("../Ajax/AVariaciones.php?Op=Desactivar",{IdVariaciones : IdVariaciones}, function(e){

        bootbox.alert(e);
        tablaP.ajax.reload();
        tabla.ajax.reload();
        tablaVA.ajax.reload();

    });


}

})


}




function Activar(IdVariaciones){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR LA VARIACION?", function(result){
    
    if(result){
    
        $.post("../Ajax/AVariaciones.php?Op=Activar",{IdVariaciones : IdVariaciones}, function(e){
    
            bootbox.alert(e);
            tablaP.ajax.reload();
            tabla.ajax.reload();
            tablaVA.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }

    function Aceptar(IdVariaciones){

        bootbox.confirm("¿ESTA SEGURO DE ACEPTAR LA VARIACION?", function(result){
        
        if(result){
        
            $.post("../Ajax/AVariaciones.php?Op=Aceptar",{IdVariaciones : IdVariaciones}, function(e){
        
                bootbox.alert(e);
                tablaP.ajax.reload();
                tabla.ajax.reload();
                tablaVA.ajax.reload();

        
            });
        
        
        }
        
        })
        
        
        }

        function Rechazar(IdPedidoSemanal){

            bootbox.confirm("¿ESTA SEGURO DE RECHAZAR EL PEDIDO?", function(result){
            
            if(result){
            
                $.post("../Ajax/AVariaciones.php?Op=Rechazar",{IdPedidoSemanal : IdPedidoSemanal}, function(e){
            
                    bootbox.alert(e);
                    tablaP.ajax.reload();
                    tabla.ajax.reload();
                    tablaVA.ajax.reload();
            
                });
            
            
            }
            
            })
            
            
            }



init();