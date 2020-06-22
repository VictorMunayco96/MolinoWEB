<?php

ob_start();
session_start();

if(!isset($_SESSION["IdUsuario"])){

  header("LOCATION: Login.php");

}else{


require 'Header.php';

if($_SESSION["Transporte"]==1){




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
                          <h1 class="box-title">Producto Presentacion
                            <button class="btn btn-success" onclick="MostrarForm(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    
                    <div class="panel-body" style="height: 600px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">

                    <div class="form-group col-log-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Placa - Conductor:</label>
                    <input type="hidden"  name="IdPeso" id="IdPeso" >
                    <select id="IdConductorVehiculo" name ="IdConductorVehiculo" class="form-control selectpicker" data-live-search="true" required> </select>
                    </div>


                    <div class="form-group col-log-12 col-md-12 col-sm-6 col-xs-12">
                    <label>Guia:</label>
                    <input type="text" name="NumGuia" class="form-control" id="NumGuia" placeholder="Numero Guia">
                    </div>

                    <div class="form-group col-log-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Proveedor/Cliente</label>
                    
                    <select id="IdProveClien" name ="IdProveClien" class="form-control selectpicker" data-live-search="true" required> </select>
                    </div>


                    <div class="form-group col-log-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Destino</label>
                    
                    <select id="IdDestinoBloq" name ="IdDestinoBloq" class="form-control selectpicker" data-live-search="true" required> </select>
                    </div>

                    
                    <div class="form-group col-log-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Producto</label>
                    <select id="IdDescProd" name ="IdDescProd" class="form-control selectpicker" data-live-search="true" required> </select>
                    </div>

                    <div class="form-group col-log-3 col-md-3 col-sm-3 col-xs-3">
                    <label>Peso Entrada:</label>
                    <input type="number" name="PesoCE" class="form-control" id="PesoCE" placeholder="Peso Entrada">
                    </div>

                    <div class="form-group col-log-3 col-md-3 col-sm-3 col-xs-3">
                    <label>Peso Salida:</label>
                    <input type="number" name="PesoCS" class="form-control" id="PesoCS" placeholder="Peso Salida">
                    </div>

                    
                    <div class="form-group col-log-3 col-md-3 col-sm-3 col-xs-3">
                    <label>Peso Neto:</label>
                    <input type="number" name="NetoCS" class="form-control" id="NetoCS" placeholder="Peso Neto">
                    </div>


                    <div class="form-group col-log-12 col-md-12 col-sm-6 col-xs-12">
                    <label>Observacion:</label>
                    <input type="text" name="ObservS" class="form-control" id="ObservS" placeholder="Observacion">
                    </div>


                  

                   

                   




                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <button class="btn btn-primary" type="submit" name="BtnGuardar" id="BtnGuardar" ><i class="fa fa-save"></i> Guardar</button>


                      <button class="btn btn-danger" onclick="CancelarForm()" type="button"><i class="fa fa-arrow-circle-left"></i>
                    Cancelar</button>


                    </div>


                    </form>


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

<script type="text/javascript" src="Scripts/BalanzaReg.js"></script>

<?php 

}
ob_end_flush();
?>