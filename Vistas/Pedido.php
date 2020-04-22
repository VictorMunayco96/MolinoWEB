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
                          <h1 class="box-title">Pedido
                         
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
                        <th>Total Mezclas</th>
                        <th>Avance Programado</th>
                        <th>Pedido Pendientes</th>
                        <th>Estado</th>

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                        
                        <th>Opciones</th>
                        <th>Sector</th>
                        <th>Orden Envio</th>
                        <th>Total Mezclas</th>
                        <th>Avance Programado</th>
                        <th>Pedido Pendientes</th>
                        <th>Estado</th>

                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body table-responsive" id="ListadoPedidoSemanal">
                        <table id="tbllistadoPS" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>

                        <th>Opciones</th>
                      
                        <th>Sector</th>
                      
                        <th>Bloque</th>
                        <th>Tipo Alimento</th>
                        <th>Total Pedido</th>
                        <th>Avance</th>
                        <th>Restante</th>
                        <th>Observacion</th>
                        <th>Fecha/Hora</th>
                        <th>Usuario</th>
                      
                        <th>Estado Pedido</th>
                        <th>Estado Registro</th>
                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      <th>Opciones</th>
                      
                      <th>Sector</th>
                    
                      <th>Bloque</th>
                      <th>Tipo Alimento</th>
                      <th>Total Pedido</th>
                      <th>Avance</th>
                      <th>Restante</th>
                      <th>Observacion</th>
                      <th>Fecha/Hora</th>
                      <th>Usuario</th>
                    
                      <th>Estado Pedido</th>
                      <th>Estado Registro</th>

                    </tfoot>
                      
                       



                        </table>
                    </div>





                    <div class="panel-body table-responsive" id="ListadoPedido">
         <table id="tbllistadoPE" class="table table-striped table-bordered table-condensed table-hover" >

            <thead>

                        <th>Opciones</th>
                        <?php if($_SESSION['TipoUsuario']=='ADMINISTRADOR'){echo '<th>Aprobar/Cancelar</th>';}?>
                        <th>Sector</th>
                        <th>Bloque</th>
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






                    <div class="panel-body" style="height: 400px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">

                                        
                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Cantidad Batch:</label>
                    <input type="number" name="CantidadBatch" class="form-control" id="CantidadBatch" placeholder="CantidadBatch" required>
                    </div>




                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>CantidadKG:</label>
                    <input type="hidden" name="IdPedido" id="IdPedido">
                    <input type="hidden" name="IdPedidoSemanal" id="IdPedidoSemanal">
                    <input type="number" class="form-control" placeholder="CantidadKG" name="CantidadKG" id="CantidadKG"  required>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Tipo Transporte:</label>
                    <select id="TipoTransporte" name ="TipoTransporte" class="form-control selectpicker" required> 
                    <option value="SELECCIONAR">SELECCIONAR</option>
                    <option value="GRANDE">GRANDE</option>
                    <option value="CHICO">CHICO</option>
                    



                    </select>
                    </div>





                 

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Observacion:</label>
                    <input type="text" name="Observacion" class="form-control" id="Observacion" placeholder="Observacion">
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

<script type="text/javascript" src="Scripts/Pedido.js"></script>

<?php 

}
ob_end_flush();
?>