
<?php

ob_start();
session_start();

if(!isset($_SESSION["IdUsuario"])){

  header("LOCATION: Login.php");

}else{


require 'Header.php';

if($_SESSION["Almacen"]==1){
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
                          <h1 class="box-title">Almacen Entrada
                            <!-- <button class="btn btn-success" onclick="MostrarForm(3)"><i class="fa fa-plus-circle"></i> Agregar</button>-->
                             <button class="btn btn-danger" onclick="MostrarForm(1)"><i class="fa fa-arrow-circle-left"></i> Volver</button></h1>

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                 <!--    /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="ListadoDescProdEmpaque">
                        <table id="tbllistadoDPE" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>

                        <th>Opciones</th>
                        <th>Producto</th>
                        <th>Presentacion</th>
                        <th>Paquete</th>
                        <th>Unidades</th>
                        <th>Ingreso</th>
                        <th>Salida</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        
                      

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      
                   
                      <th>Opciones</th>
                        <th>Producto</th>
                        <th>Presentacion</th>
                        <th>Paquete</th>
                        <th>Unidades</th>
                        <th>Ingreso</th>
                        <th>Salida</th>
                        <th>Stock</th>
                        <th>Estado</th>
                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body table-responsive" id="ListadoPedido">
                        <table id="tbllistadoP" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>

                        <th>Opciones</th>
                        <th>Aprobar/Cancelar</th>
                        <th>Producto</th>
                        <th>Presentacion</th>
                        <th>Lote</th>
                        <th>Placa</th>
                        <th>Cantidad</th>
                      <th>Salida</th>
                        <th>Stock</th>
                        <th>Fecha Ingreso</th>
                        
                        
                        <th>Usuario</th>
                     
                        <th>Estado Registro</th>
                        <th>Estado </th>
                       
                       

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      
                      <th>Opciones</th>
                        <th>Aprobar/Cancelar</th>
                        <th>Producto</th>
                        <th>Presentacion</th>
                        <th>Lote</th>
                        <th>Placa</th>
                        <th>Cantidad</th>
                      <th>Salida</th>
                        <th>Stock</th>
                        <th>Fecha Ingreso</th>
                        
                        <th>Usuario</th>
                     
                        <th>Estado Registro</th>
                        <th>Estado </th>
                       
                       

                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body" style="height: 600px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">

                  
                   


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Lote:</label>
                    <input type="hidden" name="IdAlmacenEntrada" id="IdAlmacenEntrada">
                    <input type="hidden" name="IdDescProdEmpaque" id="IdDescProdEmpaque">
                    <input type="text" class="form-control" placeholder="Lote" name="Lote" id="Lote"  required>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Cantidad:</label>
                    <input type="number" name="Cantidad" class="form-control" id="Cantidad" placeholder="Cantidad" required>
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Placa:</label>
                    <input type="text" name="Placa" class="form-control" id="Placa" placeholder="Placa">
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

<script type="text/javascript" src="Scripts/AlmacenEntrada.js"></script>

<?php 

}
ob_end_flush();
?>