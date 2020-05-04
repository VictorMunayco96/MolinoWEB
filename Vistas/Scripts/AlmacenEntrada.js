var tabla;
var tablaP;

function init(){

MostrarForm(1);
ListarDescProdEmpaque();
limpiar();
$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})

    




}



function limpiar(){

    $("#IdAlmacenEntrada").val("");
$("#Lote").val("");
$("#Cantidad").val("");
$("#Placa").val("");
$("#IdDescProdEmpaque").val("");




}

function Mostrar(IdAlmacenEntrada)
{

    
    $.post("../Ajax/AAlmacenEntrada.php?Op=Mostrar",{IdAlmacenEntrada : IdAlmacenEntrada}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(3);

            $("#IdAlmacenEntrada").val(data.IdAlmacenEntrada);
            $("#IdDescProdEmpaque").val(data.IdDescProdEmpaque);
           
           
           
            $("#Lote").val(data.Lote);
            $("#Cantidad").val(data.Cantidad);
            $("#Placa").val(data.Placa);


           

          
           
          



         




})


}



function AgregarAlmacenEntrada(IdDescProdEmpaque)
{

    MostrarForm(3);
        $("#IdDescProdEmpaque").val(IdDescProdEmpaque);
      


     


}









function MostrarForm($Ventana){

    limpiar();
    if ($Ventana==1){
    
    $("#ListadoDescProdEmpaque").show();
    $("#FormularioRegistros").hide();
    $("#ListadoPedido").hide();
    $("#BtnGuardar").prop("disabled",false);
    
    
    }

    if ($Ventana==2){
    
        $("#ListadoDescProdEmpaque").hide();
        $("#FormularioRegistros").hide();
        $("#ListadoPedido").show();
        $("#BtnGuardar").prop("disabled",false);
        
        
        }

        if ($Ventana==3){
    
            $("#ListadoDescProdEmpaque").hide();
            $("#FormularioRegistros").show();
            $("#ListadoPedido").hide();
            $("#BtnGuardar").prop("disabled",false);
            
            
            }
        

    

}



function CancelarForm(){

    limpiar();
    MostrarForm(1);
}

function ListarDescProdEmpaque(){

tabla=$("#tbllistadoDPE").dataTable(
    
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

        url: '../Ajax/AAlmacenEntrada.php?Op=ListarDescProdEmpaque',
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

url: "../Ajax/AAlmacenEntrada.php?Op=GuardaryEditar",
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

function ListarAlmacenEntrada(IdDescProdEmpaque)
{
   MostrarForm(2);

var Hola = IdDescProdEmpaque;
   
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

        url: '../Ajax/AAlmacenEntrada.php?Op=ListarAlmacenEntrada&IdDescProdEmpaque='+Hola,
      
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

function Desactivar(IdAlmacenEntrada){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR LA ENTRADA?", function(result){

if(result){

    $.post("../Ajax/AAlmacenEntrada.php?Op=Desactivar",{IdAlmacenEntrada : IdAlmacenEntrada}, function(e){

        bootbox.alert(e);
        tablaP.ajax.reload();
        tabla.ajax.reload();

    });


}

})


}




function Activar(IdAlmacenEntrada){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR LA ENTRADA?", function(result){
    
    if(result){
    
        $.post("../Ajax/AAlmacenEntrada.php?Op=Activar",{IdAlmacenEntrada : IdAlmacenEntrada}, function(e){
    
            bootbox.alert(e);
            tablaP.ajax.reload();
            tabla.ajax.reload();
    
        });
    
    
    }
    
    })
    
    
    }

    function Aceptar(IdAlmacenEntrada){

        bootbox.confirm("¿ESTA SEGURO DE ACEPTAR LA ENTRADA?", function(result){
        
        if(result){
        
            $.post("../Ajax/AAlmacenEntrada.php?Op=Aceptar",{IdAlmacenEntrada : IdAlmacenEntrada}, function(e){
        
                bootbox.alert(e);
                tablaP.ajax.reload();
                tabla.ajax.reload();
        
            });
        
        
        }
        
        })
        
        
        }

        function Rechazar(IdAlmacenEntrada){

            bootbox.confirm("¿ESTA SEGURO DE RECHAZAR LA ENTRADA?", function(result){
            
            if(result){
            
                $.post("../Ajax/AAlmacenEntrada.php?Op=Rechazar",{IdAlmacenEntrada : IdAlmacenEntrada}, function(e){
            
                    bootbox.alert(e);
                    tablaP.ajax.reload();
                    tabla.ajax.reload();
            
                });
            
            
            }
            
            })
            
            
            }



init();