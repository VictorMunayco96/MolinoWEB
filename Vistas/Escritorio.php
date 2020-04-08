<?php

ob_start();
session_start();

if(!isset($_SESSION["IdUsuario"])){

  header("LOCATION: Login.php");

}else{


require 'Header.php';

if($_SESSION["Escritorio"]==1){

  require_once "../Modelos/MConsultas.php";
  $MConsulta = new MConsultas();

  $RsptaPE = $MConsulta->EscPedido($_SESSION['NumSemana']);
  $RsptaPA = $MConsulta->EscPanel($_SESSION['NumSemana']);


  $RegPE=$RsptaPE->fetch_object();
  $RegPA=$RsptaPA->fetch_object();


  $TotalPE=$RegPE->TotalPedidoSemana;
  $TotalPA=$RegPA->TotalPesoPanel;
/*
  //GRAFICO DE BARRAS
  $DestinoBatches=$MConsulta->DestinoBatch();
$Destino='';
$Batch='';

while($RegAS=$DestinoBatches->fetch_object()){

  $Destino=$Destino.'"'.$RegAS->DestinoDes.'",';
  $Batch=$Batch.$RegAS->CantidadBatch.',';


}

//QUITAMOS LA ULTIMA COMA

$Destino=substr($Destino,0,-1);
$Batch=substr($Batch,0,-1);



*/

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Escritorio
                           
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body" >
                       
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-yellow">
                              <div class="inner">
                                <h4 style="font-size:17px;">
                                  <strong><?php echo $TotalPE." KG";?></strong>
                                </h4>
                                <p>PEDIDOS CONFIRMADOS</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="ingreso.php" class="small-box-footer">Compras <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-orange">
                              <div class="inner">
                                <h4 style="font-size:17px;">
                                  <strong><?php echo $TotalPA." KG";?></strong>
                                </h4>
                                <p>PRODUCIDO PANEL</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="ingreso.php" class="small-box-footer">Compras <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-black">
                              <div class="inner">
                                <h4 style="font-size:17px;">
                                  <strong>S/9000 </strong>
                                </h4>
                                <p>Producido Balanza</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="ingreso.php" class="small-box-footer">Compras <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>




                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <div class="small-box bg-green">
                              <div class="inner">
                                <h4 style="font-size:17px;">
                                  <strong>PLANTA PRODUCIENDO</strong>
                                </h4>
                                <p>Estado Planta</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="ingreso.php" class="small-box-footer">Compras <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>


                    </div>

                    <div class="panel-body">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    
                          <div class="box box-primary">
                              <div class="box-header with-border">
                                Compras de los últimos 10 días
                              </div>
                              <div class="box-body">
                                <canvas id="compras" width="400" height="300"></canvas>
                              </div>
                          </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    
                          <div class="box box-primary">
                              <div class="box-header with-border">
                                Ventas de los últimos 12 meses
                              </div>
                              <div class="box-body">
                                <canvas id="ventas" width="400" height="300"></canvas>
                              </div>
                          </div>
                        </div>



                  

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php

}
else{

require 'NoAcceso.php';

}


require 'Footer.php';
?>

<script src="../Public/js/Chart.min.js"></script>
<script src="../Public/js/Chart.bundle.min.js"></script>
<script type="text/javascript">


/*
var barChartData = {
  labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],

  datasets: [{

      fillColor: "#6b9dfa",
      strokeColor: "#ffffff",
      highlightFill: "#1864f2",
      highlightStroke: "#ffffff",
      data: [90, 30, 10, 80, 15, 5, 15]

    },
    {

      fillColor: "#e9e225",
      strokeColor: "#ffffff",
      highlightFill: "#ee7f49",
      highlightStroke: "#ffffff",
      data: [40, 50, 70, 40, 85, 55, 15]

    }

  ]

}

var options = {
  responsive: true,
  showTooltips: false,
  onAnimationComplete: function() {

    var ctx = this.chart.ctx;
    ctx.font = this.scale.font;
    ctx.fillStyle = this.scale.textColor
    ctx.textAlign = "center";
    ctx.textBaseline = "bottom";

    this.datasets.forEach(function(dataset) {
      dataset.bars.forEach(function(bar) {
        ctx.fillText(bar.value, bar.x, bar.y - 5);
      });
    })
  }
};

var ventas = document.getElementById("ventas").getContext("2d");
ventas = new Chart(ventas).Bar(barChartData, options);

*/
var ctx = document.getElementById('ventas').getContext('2d');
var ventas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});




var ctx = document.getElementById("compras").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [
        {
            label: 'AQUI DOS LINEAS',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor:'rgba(255, 99, 132, 0.2)',    
            borderWidth: 1
        },
            {
            label: 'Xxxx',
            data: [22, 29, 33, 55, 52, 33],
            backgroundColor:'rgba(255, 99, 132,0.2)',    
            borderWidth: 1
        },
        {
            label: 'Xxxx',
            data: [23, 25, 30, 52, 57, 40],
            backgroundColor:'rgba(50, 99, 200, 0.2)',    
            borderWidth: 1
        }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>






<?php 

}
ob_end_flush();
?>