var tabla;

function init(){


Listar();

$("#FechaInicio").change(Listar);
$("#FechaFin").change(Listar);



}

function Listar(){

    var FechaInicio = $("#FechaInicio").val();
    var FechaFin = $("#FechaFin").val();


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

        url: '../Ajax/AConsultas.php?Op=SalBalanzaFec',
        data:{FechaInicio: FechaInicio, FechaFin: FechaFin},
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




init();

