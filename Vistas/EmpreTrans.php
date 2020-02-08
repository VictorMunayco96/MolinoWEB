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
                          <h1 class="box-title">Empresa Transportista
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
<th>RUC</th>
<th>Razon Social</th>
<th>Domicilio</th>
<th>Correo</th>
<th>Celular</th>
<th>Condicion</th>
<th>Observacion</th>
<th>Estado</th>












</thead>

<tbody>

</tbody>
<tfoot>

<th>Opciones</th>
<th>RUC</th>
<th>Razon Social</th>
<th>Domicilio</th>
<th>Correo</th>
<th>Celular</th>
<th>Condicion</th>
<th>Observacion</th>
<th>Estado</th>

</tfoot>





                        </table>
                    </div>

                    <div class="panel-body" style="height: 600px;" id="FormularioRegistros">
                    
                    <form name="Formulario" id="Formulario" method="POST">

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>RUC:</label>
                    <input type="hidden" name="IdEmpreTrans" id="IdEmpreTrans">
                    <input type="number" class="form-control" placeholder="RUC" name="RUC" id="RUC" maxlength="15" required>
                    </div>



                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Razon Social:</label>
                    <input type="text" name="RazonSocial" class="form-control" id="RazonSocial" placeholder="Rason Social"  >
                    </div>



                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Domicilio:</label>
                    <input type="text" name="Domicilio" class="form-control" id="Domicilio" placeholder="Domicilio" maxlength="90" required>
                    </div>


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Correo</label>
                    <input type="email" name="Correo" class="form-control" id="Correo" placeholder="Correo" required>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Celular</label>
                    <input type="number" name="NumCel" class="form-control" id="NumCel" placeholder="Celular" required>
                    </div>

                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Condicion</label>
                    <select id="Condicion" name ="Condicion" class="form-control selectpicker" data-live-search="true" required >
                    
                    <option value="SELECCION UN CAMPO" selected>SELECCIONE UN CAMPO</option>
                    <option value="AUTORIZADO">AUTORIZADO</option>
                    <option value="NO AUTORIZADO">NO AUTORIZADO</option>
                    <option value="CON OBSERVACIONES">CON OBSERVACIONES</option>
                    


                     </select>
                    </div>   



            


                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Observacion</label>
                    <input type="text" name="Observ" class="form-control" id="Observ" placeholder="Observacion" maxlength="120">
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

<script type="text/javascript" src="Scripts/EmpreTrans.js"></script>