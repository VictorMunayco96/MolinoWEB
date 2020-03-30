
<?php

ob_start();
session_start();

if(!isset($_SESSION["IdUsuario"])){

  header("LOCATION: Login.php");

}else{


require 'Header.php';

if($_SESSION["Pedido"]==1){
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
                          <h1 class="box-title">Pedido Semanal
                             <button class="btn btn-success" onclick="MostrarForm(3)"><i class="fa fa-plus-circle"></i> Agregar</button>
                             <button class="btn btn-danger" onclick="MostrarForm(1)"><i class="fa fa-arrow-circle-left"></i> Volver</button></h1>

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                 <!--    /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="ListadoCabecera">
                        <table id="tbllistadoC" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>

                        <th>Opciones</th>
                        <th>Sector</th>
                        <th>Tipo Transporte</th>
                        <th>Orden Envio</th>
                        <th>Pendientes</th>
                        <th>Pendientes</th>

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                        <th>Opciones</th>
                        <th>Sector</th>
                        <th>Tipo Transporte</th>
                        <th>Orden Envio</th>
                        <th>Pendientes</th>
                        <th>Pendientes</th>
                       

                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body table-responsive" id="ListadoPedido">
                        <table id="tbllistadoP" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>

                        <th>Opciones</th>
                        <?php if($_SESSION['TipoUsuario']=='ADMINISTRADOR'){echo '<th>Aprobar/Cancelar</th>';}?>
                        <th>Sector</th>
                      
                        <th>Tipo Alimento</th>
                        <th>Cantidad Mezclas</th>
                        <th>Total KG</th>
                        <th>Observacion</th>
                        <th>Usuario</th>
                        <th>Estado Pedido</th>
                        <th>Estado Registro</th>
                        <th>Estado Registro</th>
                       

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      <th>Opciones</th>
                      <?php if($_SESSION['TipoUsuario']=='ADMINISTRADOR'){echo '<th>Aprobar/Cancelar</th>';}?>
                        <th>Sector</th>
                        <th>Tipo Alimento</th>
                        <th>Cantidad Mezclas</th>
                        <th>Total KG</th>
                        <th>Observacion</th>
                        <th>Usuario</th>
                        <th>Estado Pedido</th>
                        <th>Estado Registro</th>
                        <th>Estado Registro</th>
                       

                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">

                    <div class="form-group col-log-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Sector - Vehiculo:</label>
                    <select id="IdCabeceraPedido" name ="IdCabeceraPedido" class="form-control selectpicker" data-live-search="true" required> </select>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Producto:</label>
                    <select id="IdDescProd" name ="IdDescProd" class="form-control selectpicker" data-live-search="true" required> </select>
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Cantidad Mezclas:</label>
                    <input type="hidden" name="IdPedido" id="IdPedido">
                    <input type="number" class="form-control" placeholder="Cantidad Mezclas" name="CantidadBatch" id="CantidadBatch"  required>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Observacion:</label>
                    <input type="text" name="Observacion" class="form-control" id="Observacion" placeholder="Observacion" maxlength="120">
                    </div>

                 

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Cantidad KG:</label>
                    <input type="number" name="CantidadKG" class="form-control" id="CantidadKG" placeholder="Total Kilos" required>
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

<script type="text/javascript" src="Scripts/PedidoSemanal.js"></script>

<?php 

}
ob_end_flush();
?>