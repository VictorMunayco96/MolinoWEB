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

<script type="text/javascript" src="Scripts/DescProd.js"></script>

<?php 

}
ob_end_flush();
?>