<?php

ob_start();
session_start();

if(!isset($_SESSION["IdUsuario"])){

  header("LOCATION: Login.php");

}else{


require 'Header.php';

if($_SESSION["Escritorio"]==1){




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
                       
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="small-box bg-green">
<div class="inner">

<h4 style="font-size:17px;">
<strong>Hola Mundo</strong>
</h4>
<p>Compras</p>
<p>Compras</p>


</div>
</div>

                    </div>


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

<div class="small-box bg-yellow">
<div class="inner">

<h4 style="font-size:17px;">
<strong>Hola Mundo</strong>
</h4>
<p>Compras</p>
<p>Compras</p>


</div>
</div>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

<div class="small-box bg-aqua">
<div class="inner">

<h4 style="font-size:17px;">
<strong>Hola Mundo</strong>
</h4>
<p>Compras</p>
<p>Compras</p>


</div>
</div>

                    </div>




                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
<div class="small-box bg-black">
<div class="inner">

<h4 style="font-size:17px;">
<strong>Hola Mundo</strong>
</h4>
<p>Compras</p>
<p>Compras</p>


</div>
</div>

                    </div>


                    </div>

                    <div class="panel-body" style="height: 400px;">
                    
                    


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