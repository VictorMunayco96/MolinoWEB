<?php

ob_start();
session_start();

if(!isset($_SESSION["IdUsuario"])){

  header("LOCATION: Login.php");

}else{


require 'Header.php';

if($_SESSION["Panel"]==1){
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
                          <h1 class="box-title">Panel
                          <button class="btn btn-success" onclick="MostrarForm(4)"><i class="fa fa-list"></i> Registros</button></h1>
                             <button class="btn btn-warning" onclick="MostrarForm(1)"><i class="fa fa-plus"></i> Pedidos</button></h1>
                            
                             

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                 <!--    /.box-header -->
                    <!-- centro -->

                    <div class="panel-body table-responsive" id="ListadoPanel">
                        <table id="tbllistadoPA" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>

                        <th>Opciones</th>
                        <th>Codigo Panel</th>
                        <th>Destino</th>
                        <th>Tipo Transporte</th>
                        <th>Tipo Alimento</th>
                        
                        <th>Cantidad Batch</th>
                        <th>Numero Silo</th>
                        <th>Peso Panel</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Estado</th>

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      <th>Opciones</th>
                        <th>Codigo Panel</th>
                        <th>Destino</th>
                        <th>Tipo Transporte</th>
                        <th>Tipo Alimento</th>
                        
                        <th>Cantidad Batch</th>
                        <th>Numero Silo</th>
                        <th>Peso Panel</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Estado</th>

                    </tfoot>
                      
                       



                        </table>
                    </div>



                


                    <div class="panel-body table-responsive" id="ListadoCabecera">
                        <table id="tbllistadoC" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>

                        <th>Opciones</th>
                        <th>Sector</th>
                        <th>Tipo Transporte</th>
                        <th>Orden Envio</th>
                        <th>Pendientes</th>
                        <th>Estado</th>

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                        <th>Opciones</th>
                        <th>Sector</th>
                        <th>Tipo Transporte</th>
                        <th>Orden Envio</th>
                        <th>Pendientes</th>
                        <th>Estado</th>

                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body table-responsive" id="ListadoPedido">
                        <table id="tbllistadoP" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>

                        <th>Opciones</th>
                       
                        <th>Sector</th>
                      
                        <th>Tipo Alimento</th>
                        <th>Cantidad Mezclas</th>
                        <th>Falta Producir</th>
                        <th>Total KG</th>
                        <th>Observacion</th>
                        <th>Usuario</th>
                      
                        <th>Estado Pedido</th>
                       

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      <th>Opciones</th>
                    
                        <th>Sector</th>
                        <th>Tipo Alimento</th>
                        <th>Cantidad Mezclas</th>
                        <th>Falta Producir</th>
                        <th>Total KG</th>
                        <th>Observacion</th>
                        <th>Usuario</th>
                        
                        <th>Estado Pedido</th>
                       

                    </tfoot>
                      
                       



                        </table>
                    </div>


                    <div class="panel-body" style="height: 400px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Codigo Produccion:</label>
                    <input type="number" name="CodProduccion" class="form-control" id="CodProduccion" placeholder="Codigo Produccion">
                   </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Numero Silo:</label>
                    <select id="NumSilo" name ="NumSilo" class="form-control selectpicker" data-live-search="true" required> 
                    <option value="SELECCIONAR" selected>SELECCIONAR</option>
                    <option value="P1">P1</option>
                    <option value="P2">P2</option>
                    <option value="P3">P3</option>
                    <option value="P4">P4</option>
                    <option value="P5">P5</option>
                    <option value="P6">P6</option>
                    <option value="P7">P7</option>
                    <option value="P8">P8</option>
                    </select>
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Cantidad Batch:</label>
                    <input type="hidden" name="IdPanel" id="IdPanel">
                    <input type="hidden" name="IdPedido" id="IdPedido">
                    <input type="number" class="form-control" placeholder="Cantidad Mezclas" name="CantidadBatch" id="CantidadBatch"  required>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Peso Panel:</label>
                    <input type="number" name="PesoPanel" class="form-control" id="PesoPanel" placeholder="Peso Panel">
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

<script type="text/javascript" src="Scripts/Panel.js"></script>

<?php 

}
ob_end_flush();
?>