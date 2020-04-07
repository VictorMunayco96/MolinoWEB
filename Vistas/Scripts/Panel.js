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



function MostrarPanel(IdPanel)
{

    
    $.post("../Ajax/APanel.php?Op=MostrarPanel",{IdPanel : IdPanel}, function(data,status)
        {
            data =JSON.parse(data);
            
            MostrarForm(3);

        $("#IdPanel").val(data.IdPanel);
        $("#IdPedido").val(data.IdPedido);
        $("#CodProduccion").val(data.CodProduccion);
        $("#NumSilo").val(data.NumSilo);
        $("#NumSilo").selectpicker('refresh');
 $("#CantidadBatch").val(data.CantidadBatch);
 $("#PesoPanel").val(data.PesoPanel);




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
    MostrarForm(1);
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
    "iDisplayLength":10,
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
    MostrarForm(4);
    tablaPA.ajax.reload();
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
    "iDisplayLength":10,
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

function Desactivar(IdPanel){

bootbox.confirm("¿ESTA SEGURO DE DESACTIVAR EL REGISTRO?", function(result){

if(result){

    $.post("../Ajax/APanel.php?Op=Desactivar",{IdPanel : IdPanel}, function(e){

        bootbox.alert(e);
        tablaPA.ajax.reload();
    
    });


}

})


}




function Activar(IdPanel){

    bootbox.confirm("¿ESTA SEGURO DE ACTIVAR EL REGISTRO?", function(result){
    
    if(result){
    
        $.post("../Ajax/APanel.php?Op=Activar",{IdPanel : IdPanel}, function(e){
    
            bootbox.alert(e);
            tablaPA.ajax.reload();
    
            
    
        });
    
    
    }
    
    })
    
    
    }

   




init();