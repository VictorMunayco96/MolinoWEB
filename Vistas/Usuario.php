<?php
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
                          <h1 class="box-title">Usuario
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
                        <th>Usuario</th>
                       
                        <th>Tipo Usuario</th>
                        <th>Nombres y Apellidos</th>
                        <th>Estado</th>

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      <th>Opciones</th>
                        <th>Usuario</th>
                    
                        <th>Tipo Usuario</th>
                        <th>Nombres y Apellidos</th>
                        <th>Estado</th>



                    </tfoot>
                      
                       



                        </table>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">


                    <div class="form-group col-log-12 col-md-12 col-sm-12 col-xs-12">
                    <label>Empleado:</label>
                    <select id="IdEmpleado" name ="IdEmpleado" class="form-control selectpicker" data-live-search="true" required> </select>
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Usuario:</label>
                    <input type="hidden" name="IdUsuario" id="IdUsuario">
                    <input type="text" class="form-control" placeholder="Usuario" name="Usuario" id="Usuario" maxlength="50" required>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Contraseña:</label>
                    <input type="password" name="Contrasena" class="form-control" id="Contrasena" placeholder="Contrasena" maxlength="64" required>
                    </div>

                  


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Privilegios:</label>
                    <ul style="list-style: none" id="Permiso">
                    

                    
                    </ul>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Tipo Usuario:</label>
                    <input type="text" name="TipoUsuario" class="form-control" id="TipoUsuario" placeholder="TipoUsuario" maxlength="30" required>
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

<script type="text/javascript" src="Scripts/Usuario.js"></script>