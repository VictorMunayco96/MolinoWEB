<?php

ob_start();
session_start();

if(!isset($_SESSION["IdUsuario"])){

  header("LOCATION: Login.php");

}else{



require 'Header.php';

if($_SESSION["BTransporte"]==1){


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
                          <h1 class="box-title">Conductor
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
<th>Codigo</th>
<th>DNI</th>
<th>Licencia</th>
<th>Nombres y Apellidos</th>
<th>Nacionalidad</th>
<th>TipoBrevete</th>
<th>Condicion</th>
<th>Observacion</th>
<th>Estado</th>












</thead>

<tbody>

</tbody>
<tfoot>

<th>Opciones</th>
<th>Codigo</th>
<th>DNI</th>
<th>Licencia</th>
<th>Nombres y Apellidos</th>
<th>Nacionalidad</th>
<th>TipoBrevete</th>
<th>Condicion</th>
<th>Observacion</th>
<th>Estado</th>


</tfoot>





                        </table>
                    </div>

                    <div class="panel-body" style="height: 400px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">

                

                  



                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Licencia:</label>
                    <input type="text" name="Licencia" class="form-control" id="Licencia" placeholder="Licencia" maxlength="15" required>
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Nombre:</label>
                    <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre" maxlength="60" required>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Apellidos</label>
                    <input type="text" name="Apellidos" class="form-control" id="Apellidos" placeholder="Apellidos" maxlength="60" required>
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

<script type="text/javascript" src="Scripts/Conductor.js"></script>

<?php 

}
ob_end_flush();

?>