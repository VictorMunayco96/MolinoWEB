<?php

ob_start();
session_start();

if(!isset($_SESSION["ConsulProd"])){

  header("LOCATION: Login.php");

}else{

require 'Header.php';

if($_SESSION["ConsulProd"]==1){



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
                          <h1 class="box-title">Balanza
                            <button class="btn btn-success" onclick="MostrarForm(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="ListadoRegistros">
                       
                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Fecha Inicio:</label>
                    <input type="datetime-local" name="FechaInicio" class="form-control" id="FechaInicio" value="<?php echo date('Y-m-d'); ?>T06:30">
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Fecha Fin: </label>
                    <input type="datetime-local" name="FechaFin" class="form-control" id="FechaFin" value="<?php echo date('Y-m-d'); ?>T06:30">
                    </div>
                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Filtro</label>
                    <select id="Filtro" name ="Filtro" class="form-control selectpicker" required> 
                
                    <option value="SELECCIONAR">SELECCIONAR</option>
                    <option value="DESTINO">DESTINO</option>
                    <option value="PRODUCTO">PRODUCTO</option>
                    <option value="PROVEEDOR">PROVEEDOR</option>
                    <option value="CHOFER">CHOFER</option>
                
                    
                    
                    </select>
                   
                    </div>
                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Busqueda</label>
                    <input type="text" name="Busqueda" class="form-control" id="Busqueda">
                    <BR>
                    <button class="btn btn-success" onclick="Listar()">Mostrar</button>
                    </div>
                    
                    <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>
                    			
                        <th>ID</th>
                        <th>PLACA</th>
                        <th>CLIENTE/PROVEEDOR</th>
                        <th>PRODUCTO</th>
                        <th>N° GUIA</th>
                        <th>CONDUCTOR</th>
                        <th>DESTINO</th>
                        <th>FECHA INGRESO</th>
                        <th>FECHA SALIDA</th>
                        <th>PESO INGR</th>
                        <th>PESO SALIDA</th>
                        <th>VALOR NETO</th>
                        <th>OBSER SALIDA</th>

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      
                      <th>ID</th>
                        <th>PLACA</th>
                        <th>CLIENTE/PROVEEDOR</th>
                        <th>PRODUCTO</th>
                        <th>N° GUIA</th>
                        <th>CONDUCTOR</th>
                        <th>DESTINO</th>
                        <th>FECHA INGRESO</th>
                        <th>FECHA SALIDA</th>
                        <th>PESO INGR</th>
                        <th>PESO SALIDA</th>
                        <th>VALOR NETO</th>
                        <th>OBSER SALIDA</th>


                    </tfoot>
                      
                       



                        </table>
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

<script type="text/javascript" src="Scripts/Balanza1.js"></script>

<?php 

}
ob_end_flush();
?>