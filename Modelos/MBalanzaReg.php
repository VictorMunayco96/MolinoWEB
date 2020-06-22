<?php

require "../Config/Conexion.php";

    Class MBalanzaReg{

        public function __construct(){



        }  


        public function Insertar($NumGuia,  $PesoCE,$PesoCS, $NetoC, $ObservS, $IdUsuario, $IdProveClien, $IdConductorVehiculo, $IdDestinoBloq,$IdDescProd,$NumSemana){

            $Sql="
            
            Insert into Peso (TipoMovimiento, NumGuia, FechaHoraSal, FechaHoraEnt, PesoCE, PesoCS, NetoC,ObservS,Estado,IdUsuario, IdProveClien, IdConductorVehiculo, IdDestinoBloq, IdDescProd,NumSemana) 
            values('CLIENTE', '$NumGuia', (SELECT DATE_SUB(NOW(), INTERVAL 7 HOUR)), (SELECT DATE_SUB((select DATE_SUB(NOW(), INTERVAL 7 HOUR)), INTERVAL 20 MINUTE)), '$PesoCE', '$PesoCS', '$NetoC','$ObservS','D','$IdUsuario', '$IdProveClien', '$IdConductorVehiculo', '$IdDestinoBloq', '$IdDescProd','$NumSemana');";

            return EjecutarConsulta($Sql);

        }       
     

  

      

  



     


}




?>