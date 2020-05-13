<?php

ob_start();
session_start();

if(!isset($_SESSION["ConsulProd"])){

  header("LOCATION: Login.php");

}else{

require 'Header.php';

if($_SESSION["ConsulProd"]==1){



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
                          <h1 class="box-title">Diferencia
                            <button class="btn btn-success" onclick="MostrarForm(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="ListadoRegistros">
                       
                  
                    
                    <div class="form-group col-log-6 col-md-6 col-sm-6 col-xs-12">
                    <label>N° Semana</label>
                    <select id="NumSemana" name ="NumSemana" class="form-control selectpicker" required> 
                
                  
                    <option value="19">19</option>
                    <option value="20">20</option>
                  
                
                    
                    
                    </select>
                  
                    </div>
                    <div class="form-group col-log-12 col-md-12 col-sm-12 col-xs-12">
                   
                    <button class="btn btn-success" onclick="Listar()">Mostrar</button>
                    </div>
                    
                    <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" >

                        <thead>
                    			
                        <th>ALIMENTO</th>
                        
                        <th>PESO PANEL</th>
                        <th>PESO BALANZA</th>
                        <th>DIFERENCIA</th>
                        <th>COSTO PRODUCCION</th>

                        </thead>

                        <tbody>
                        
</tbody>
                      <tfoot>

                      
                    
                      <th>ALIMENTO</th>
                        
                        
                        <th>PESO PANEL</th>
                        <th>PESO BALANZA</th>
                        <th>DIFERENCIA</th>
                        <th>COSTO PRODUCCION</th>


                    </tfoot>
                      
                       



                        </table>
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

<script type="text/javascript" src="Scripts/Consultas.js"></script>

<?php 

}
ob_end_flush();
?>