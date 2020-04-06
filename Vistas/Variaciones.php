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
                          <h1 class="box-title">Variaciones
                            <!-- <button class="btn btn-success" onclick="MostrarForm(3)"><i class="fa fa-plus-circle"></i> Agregar</button>-->
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
                        <th>Orden Envio</th>
                        <th>Mezclas Total</th>
                        <th>Estado Pedido</th>
                        <th>Estado</th>

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      <th>Opciones</th>
                        <th>Sector</th>
                        <th>Orden Envio</th>
                        <th>Mezclas Total</th>
                        <th>Estado Pedido</th>
                        <th>Estado</th>
                       

                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body table-responsive" id="ListadoPedido">
                        <table id="tbllistadoP" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>

                        <th>Opciones</th>
                      
                        <th>Sector</th>
                        <th>Bloque</th>
                        <th>Tipo Alimento</th>
                        <th>Cantidad Mezclas</th>
                        <th>Total KG</th>
                        <th>Observacion</th>
                        <th>Fecha</th>
                        
                        <th>Usuario</th>
                        <th>Estado Pedido</th>
                       
                        <th>Estado</th>
                       
                       
                       

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      <th>Opciones</th>
                    
                      <th>Sector</th>
                        <th>Bloque</th>
                        <th>Tipo Alimento</th>
                        <th>Cantidad Mezclas</th>
                        <th>Total KG</th>
                        <th>Observacion</th>
                        <th>Fecha</th>
                        
                        <th>Usuario</th>
                        <th>Estado Pedido</th>
                       
                        <th>Estado</th>
                       
                       

                    </tfoot>
                      
                       



                        </table>
                    </div>

                    
    <div class="panel-body table-responsive" id="ListadoVariaciones">
         <table id="tbllistadoVA" class="table table-striped table-bordered table-condensed table-hover" >

            <thead>

                        <th>Opciones</th>
                        <?php if($_SESSION['TipoUsuario']=='ADMINISTRADOR'){echo '<th>Aprobar/Cancelar</th>';}?>
                         <th>Sector</th>
                        <th>Bloque</th>
                        <th>Tipo Alimento</th>
                        <th>Cantidad Mezclas</th>
                        <th>Total KG</th>
                        <th>Observacion</th>
                        <th>Fecha</th>
                        
                        
              
                       

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      <th>Opciones</th>
                      <?php if($_SESSION['TipoUsuario']=='ADMINISTRADOR'){echo '<th>Aprobar/Cancelar</th>';}?>
                      <th>Sector</th>
                        <th>Bloque</th>
                        <th>Tipo Alimento</th>
                        <th>Cantidad Mezclas</th>
                        <th>Total KG</th>
                        <th>Observacion</th>
                        <th>Fecha</th>
                        
                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body" style="height: 600px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">

                    <div class="form-group col-log-12 col-md-12 col-sm-12 col-xs-12">
                    <label>CantidadBatch:</label>
                    <input type="number" class="form-control" placeholder="Cantidad Mezclas" name="CantidadBatch" id="CantidadBatch"  required>
                    
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Motivo:</label>
                    <select id="Motivo" name ="Motivo" class="form-control selectpicker" required> 
                    <option value="SELECCIONAR" selected>SELECCIONAR</option>
                    <option value="AUMENTAR">AUMENTAR</option>
                    <option value="DISMINUIR">DISMINUIR</option>
                    </select>
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Detalle:</label>
                    <input type="hidden" name="IdPedidoSemanal" id="IdPedidoSemanal">
                    <input type="hidden" name="IdVariaciones" id="IdVariaciones">
                    <input type="text" class="form-control" placeholder="Detalle" name="Detalle" id="Detalle"  required>
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

<script type="text/javascript" src="Scripts/Variaciones.js"></script>

<?php 

}
ob_end_flush();
?>