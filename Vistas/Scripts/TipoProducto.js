var Tabla;

function init(){



}
function limpiar(){

    $("IdTipoProducto").val("");
$("TipoProducto").val("");
$("CodTipoProducto").val("");

}

function MostrarForm(flag){

limpiar();
if (flag){

$("#ListadoRegistros").hide();
$("#Formularioregistros").show();
$("#BtnGuardar").prop("disabled",false);


}else{

    $("#ListadoRegistros").show();
    $("#Formularioregistros").hide();

}


}

function cancelarForm(){

    limpiar();
    MostrarForm(flase);
}

function Listar(){

Tabla=$('#tbllistado').dataTable({

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

        url: '../Ajax/TipoProducto.php?Op=L',
        type : "get",
        dataType :"json",
        error: function(e){
            console.log(e.responseText);
        }

    }

}).DataTable();

}

init();