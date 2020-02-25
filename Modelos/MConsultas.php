<?php

require "../Config/Conexion.php";

    Class MConsultas{

        public function __construct(){



        }

       

     

        public function SalBalanzaFec($FechaInicio, $FechaFin){

            $Sql="SELECT
             peso.'IdPeso' AS IdPeso, 
             peso.`TipoMovimiento` AS TipoMovimiento,
              peso.`NumGuia` AS NumGuia,
              peso.`FechaHoraSal` AS FechaHoraSal,
              peso.`FechaHoraEnt` AS FechaHoraEnt,
              peso.`PesoCE` AS PesoCE,
              peso.`PesoCS` AS PesoCS,
              peso.`NetoC` AS NetoC,
              peso.`ObservE` AS ObservE,
              peso.`ObservS` AS ObservS,
              peso.`DNI` AS DNI,
              proveclien.`RazonSocial` AS RazonSocial,
              peso.`Precinto` AS Precinto,
              vehiculo.`Placa` AS Placa, concat(conductor.`Nombre`," ",conductor.`Apellidos`) AS NombreChofer,
             concat(destino.destino,'/ ',concat(destinodesc.`DestinoDes`,'/' ,destinoBloq.`DestinoBloq`)) AS DestinoF,
              DescProd.`DescProd` AS DescProd
         FROM
              `proveclien` proveclien INNER JOIN `peso` peso ON proveclien.`IdProveClien` = peso.`IdProveClien`
              INNER JOIN `conductorvehiculo` conductorvehiculo ON peso.`IdConductorVehiculo` = conductorvehiculo.`IdConductorVehiculo`
              INNER JOIN `destinobloq` destinobloq ON peso.`IdDestinobloq` = destinobloq.`IdDestinobloq`
              INNER JOIN `DescProd` DescProd ON peso.`IdDescProd` = DescProd.`IdDescProd`
              INNER JOIN `conductor` conductor ON conductorvehiculo.`IdConductor` = conductor.`IdConductor`
              INNER JOIN `vehiculo` vehiculo ON conductorvehiculo.`IdPlaca` = vehiculo.`IdPlaca`
              INNER JOIN `DestinoDesc` destinodesc  ON destinobloq.`IdDestinoDesc` = destinodesc.`IdDestinoDesc`
              INNER JOIN `Destino` destino  ON destinodesc.`IdDestino` = destino.`IdDestino`
                       
              where peso.`Estado`='D' and DATE(peso.FechaHoraSal)>='$FechaInicio' and DATE(peso.FechaHoraSal)<='$FechaFin' 
              
              order by IdPeso Desc limit 15000;";
            
            return EjecutarConsulta($Sql);

        }


    


}




?>