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
                          <h1 class="box-title">Producto Presentacion
                            <button class="btn btn-success" onclick="MostrarForm(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="ListadoRegistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>

                        <th>Opciones</th>
                        <th>Descripcion Producto</th>
                        <th>Presentacion</th>
                        <th>Paquete</th>
                        <th>Unidad</th>
                        <th>Estado</th>

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      <th>Opciones</th>
                        <th>Descripcion Producto</th>
                        <th>Presentacion</th>
                        <th>Paquete</th>
                        <th>Unidad</th>
                        <th>Estado</th>

                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Descripcion Producto:</label>
                    <input type="hidden"  name="IdDescProdEmpaque" id="IdDescProdEmpaque" >
                    <select id="IdDescProd" name ="IdDescProd" class="form-control selectpicker" data-live-search="true" required> </select>
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Presentacion:</label>
                    <select id="Presentacion" name ="Presentacion" class="form-control selectpicker" data-live-search="true" required> 
                    
                    <option value="SELECCION UN CAMPO" selected>SELECCIONE UN CAMPO</option>
                    <option value="COSTALES">COSTALES</option>
                    <option value="BIGBAG">BIGBAG</option>
                    <option value="CAJA">CAJA</option>
                    <option value="UNIDAD">UNIDAD</option>
                    
                    
                    
                    </select>
                    </div>

                  

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Paquete:</label>
                    <input type="text" name="Paquete" class="form-control" id="Paquete" placeholder="Paquete"  required>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Unidad:</label>
                    <input type="text" name="Unidad" class="form-control" id="Unidad" placeholder="Unidad" required>
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

<script type="text/javascript" src="Scripts/DescProdEmpaque.js"></script>

<?php 

}
ob_end_flush();
?>