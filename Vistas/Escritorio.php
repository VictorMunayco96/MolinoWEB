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
var densityCanvas = document.getElementById("ventas");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var densityData = {
  label: 'Density of Planet (kg/m3)',
  data: [5427, 5243, 5514, 3933, 1326, 687, 1271, 1638],
  backgroundColor: 'rgba(0, 99, 132, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-density"
};

var gravityData = {
  label: 'Gravity of Planet (m/s2)',
  data: [3.7, 8.9, 9.8, 3.7, 23.1, 9.0, 8.7, 11.0],
  backgroundColor: 'rgba(99, 132, 0, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-gravity"
};

var planetData = {
  labels: ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune"],
  datasets: [densityData, gravityData]
};

var chartOptions = {
  scales: {
    xAxes: [{
      barPercentage: 1,
      categoryPercentage: 0.6
    }],
    yAxes: [{
      id: "y-axis-density"
    }, {
      id: "y-axis-gravity"
    }]
  }
};

var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: planetData,
  options: chartOptions
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