<?php

ob_start();
session_start();

if(!isset($_SESSION["IdUsuario"])){

  header("LOCATION: Login.html");

}else{

require 'Header.php';
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
                          <h1 class="box-title">Empleado 
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
                        <th>DNI</th>
                        <th>Codigo</th>
                        <th>Nombres y Apellidos</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Fecha Ingreso</th>
                        <th>Estado</th>

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      
                      <th>Opciones</th>
                        <th>DNI</th>
                        <th>Codigo</th>
                        <th>Nombres y Apellidos</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Fecha Ingreso</th>
                        <th>Estado</th>


                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body" style="height: 600px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Empleado:</label>
                    <input type="hidden" name="IdEmpleado" id="IdEmpleado">
                    <input type="number" class="form-control" placeholder="DNI" name="DNI" id="DNI" required>
                    </div>



                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Codigo:</label>
                    <input type="text" name="Codigo" class="form-control" id="Codigo" placeholder="Codigo" maxlength="15">
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Nombres:</label>
                    <input type="text" name="NombreE" class="form-control" id="NombreE" placeholder="Nombres" maxlength="70">
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Apellidos:</label>
                    <input type="text" name="ApellidosE" class="form-control" id="ApellidosE" placeholder="Apellidos" maxlength="70">
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Telefono:</label>
                    <input type="number" name="Telefono" class="form-control" id="Telefono" placeholder="Telefono" maxlength="12">
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Celular:</label>
                    <input type="number" name="Celular" class="form-control" id="Celular" placeholder="Celular" maxlength="12">

                    </div>



                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Fecha Ingreso:</label>
                    <input type="date" name="FechaIngreso" class="form-control" id="FechaIngreso" placeholder="Fecha Ingreso">
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

require 'Footer.php';
?>

<script type="text/javascript" src="Scripts/Empleado.js"></script>

<?php 

}
ob_end_flush();
?>