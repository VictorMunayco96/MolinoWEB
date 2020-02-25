var tabla;

function init(){







}

function Listar(){

    var FechaInicio = $("#FechaInicio").val();
    var FechaFin = $("#FechaFin").val();

    var Busqueda = $("#Busqueda").val();
    var Filtro = $("#Filtro").val();



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
        data:{FechaInicio: FechaInicio, FechaFin: FechaFin, Busqueda: Busqueda, Filtro:Filtro},
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

