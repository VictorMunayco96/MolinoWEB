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
                    <label>Codigo:</label>
                    <input type="hidden" name="IdConductor" id="IdConductor">
                    <input type="text" class="form-control" placeholder="Codigo" name="CodConduc" id="CodConduc" maxlength="45" required>
                    </div>



                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>DNI:</label>
                    <input type="number" name="DNI" class="form-control" id="DNI" placeholder="DNI"  >
                    </div>



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



                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Nacionalidad</label>
                    <select id="Nacionalidad" name ="Nacionalidad" class="form-control selectpicker" data-live-search="true" required> 
                    <option value="SELECCION UN CAMPO" selected>SELECCIONE UN CAMPO</option>
                    <option value="PERUANO">PERUANO</option>
                    <option value="VENEZOLANO">VENEZOLANO</option>
                    <option value="BOLIVIANO">BOLIVIANO</option>
                    
                    
                    
                    </select>
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Tipo Brevete</label>
                    <select id="TipoBrevete" name ="TipoBrevete" class="form-control selectpicker" data-live-search="true" required > 
                    

                    <option value="SELECCIONE UN CAMPO" selected>SELECCIONE UN CAMPO</option>
                    <option value="A-I">A-I</option>
                    <option value="A-IIa">A-IIa</option>
                    <option value="A-IIb">A-IIb</option>
                    <option value="A-IIIa">A-IIIa</option>
                    <option value="A-IIIb">A-IIIb</option>
                    <option value="A-IIIc">A-IIIc</option>
                    <option value="B-I">B-I</option>
                    <option value="B-IIa">B-IIa</option>
                    <option value="B-IIb">B-IIb</option>
                    <option value="B-IIc">B-IIc</option>
                    
                    </select>
                 
                    
                    
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Condicion</label>
                    <select id="Condicion" name ="Condicion" class="form-control selectpicker" data-live-search="true" required >

                     <option value="SELECCIONE UN CAMPO" selected>SELECCIONE UN CAMPO</option>
                    <option value="AUTORIZADO" >AUTORIZADO</option>
                    <option value="NO AUTORIZADO">NO AUTORIZADO</option>
                    <option value="CON OBSERVACIONES">CON OBSERVACIONES</option>
                    


                     </select>
                    </div>                  


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Observacion</label>
                    <input type="text" name="Observacion" class="form-control" id="Observacion" placeholder="Observacion" maxlength="120">
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

<script type="text/javascript" src="Scripts/Conductor.js"></script>