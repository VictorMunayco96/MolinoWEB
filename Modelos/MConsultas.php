<?php

require "../Config/Conexion.php";

    Class MConsultas{

        public function __construct(){



        }

       

     

        public function SalBalanzaFec($FechaInicio, $FechaFin, $Busqueda, $Filtro){

           
           if($Filtro=="PRODUCTO"){

            $Sql="SELECT
            peso.IdPeso, 
            peso.TipoMovimiento,
             peso.NumGuia,
             peso.FechaHoraSal,
             peso.FechaHoraEnt,
             peso.PesoCE,
             peso.PesoCS,
             peso.NetoC,
             peso.ObservE,
             peso.ObservS,
             peso.IdUsuario,
             proveclien.RazonSocial,
             peso.Precinto,
             vehiculo.Placa, 
             conductor.Nombre,
             conductor.Apellidos,
           destino.destino as Dest,
           destinodesc.DestinoDes,
           destinoBloq.DestinoBloq,
             DescProd.DescProd
        FROM
             proveclien proveclien INNER JOIN peso peso ON proveclien.IdProveClien = peso.IdProveClien
             INNER JOIN conductorvehiculo conductorvehiculo ON peso.IdConductorVehiculo = conductorvehiculo.IdConductorVehiculo
             INNER JOIN destinobloq destinobloq ON peso.IdDestinobloq = destinobloq.IdDestinobloq
             INNER JOIN DescProd DescProd ON peso.IdDescProd = DescProd.IdDescProd
             INNER JOIN conductor conductor ON conductorvehiculo.IdConductor = conductor.IdConductor
             INNER JOIN vehiculo vehiculo ON conductorvehiculo.IdPlaca = vehiculo.IdPlaca
             INNER JOIN DestinoDesc destinodesc  ON destinobloq.IdDestinoDesc = destinodesc.IdDestinoDesc
             INNER JOIN Destino destino  ON destinodesc.IdDestino = destino.IdDestino 
                      
             where peso.Estado='D' and peso.FechaHoraSal>='$FechaInicio' and peso.FechaHoraSal<='$FechaFin' 
             and  DescProd.DescProd like concat('%','$Busqueda','%') 
             
             order by peso.IdPeso Desc limit 15000;";



           }
           
           if($Filtro=="DESTINO"){

            $Sql="SELECT
            peso.IdPeso, 
            peso.TipoMovimiento,
             peso.NumGuia,
             peso.FechaHoraSal,
             peso.FechaHoraEnt,
             peso.PesoCE,
             peso.PesoCS,
             peso.NetoC,
             peso.ObservE,
             peso.ObservS,
             peso.IdUsuario,
             proveclien.RazonSocial,
             peso.Precinto,
             vehiculo.Placa, 
             conductor.Nombre,
             conductor.Apellidos,
           destino.destino as Dest,
           destinodesc.DestinoDes,
           destinoBloq.DestinoBloq,
             DescProd.DescProd
        FROM
             proveclien proveclien INNER JOIN peso peso ON proveclien.IdProveClien = peso.IdProveClien
             INNER JOIN conductorvehiculo conductorvehiculo ON peso.IdConductorVehiculo = conductorvehiculo.IdConductorVehiculo
             INNER JOIN destinobloq destinobloq ON peso.IdDestinobloq = destinobloq.IdDestinobloq
             INNER JOIN DescProd DescProd ON peso.IdDescProd = DescProd.IdDescProd
             INNER JOIN conductor conductor ON conductorvehiculo.IdConductor = conductor.IdConductor
             INNER JOIN vehiculo vehiculo ON conductorvehiculo.IdPlaca = vehiculo.IdPlaca
             INNER JOIN DestinoDesc destinodesc  ON destinobloq.IdDestinoDesc = destinodesc.IdDestinoDesc
             INNER JOIN Destino destino  ON destinodesc.IdDestino = destino.IdDestino 
                      
             where peso.Estado='D' and DATE(peso.FechaHoraSal)>='$FechaInicio' and DATE(peso.FechaHoraSal)<='$FechaFin' 
             and  destinodesc.DestinoDes like concat('%','$Busqueda','%') 
             
             order by peso.IdPeso Desc limit 15000;";


           }

           if($Filtro=="PROVEEDOR"){

            $Sql="SELECT
            peso.IdPeso, 
            peso.TipoMovimiento,
             peso.NumGuia,
             peso.FechaHoraSal,
             peso.FechaHoraEnt,
             peso.PesoCE,
             peso.PesoCS,
             peso.NetoC,
             peso.ObservE,
             peso.ObservS,
             peso.IdUsuario,
             proveclien.RazonSocial,
             peso.Precinto,
             vehiculo.Placa, 
             conductor.Nombre,
             conductor.Apellidos,
           destino.destino as Dest,
           destinodesc.DestinoDes,
           destinoBloq.DestinoBloq,
             DescProd.DescProd
        FROM
             proveclien proveclien INNER JOIN peso peso ON proveclien.IdProveClien = peso.IdProveClien
             INNER JOIN conductorvehiculo conductorvehiculo ON peso.IdConductorVehiculo = conductorvehiculo.IdConductorVehiculo
             INNER JOIN destinobloq destinobloq ON peso.IdDestinobloq = destinobloq.IdDestinobloq
             INNER JOIN DescProd DescProd ON peso.IdDescProd = DescProd.IdDescProd
             INNER JOIN conductor conductor ON conductorvehiculo.IdConductor = conductor.IdConductor
             INNER JOIN vehiculo vehiculo ON conductorvehiculo.IdPlaca = vehiculo.IdPlaca
             INNER JOIN DestinoDesc destinodesc  ON destinobloq.IdDestinoDesc = destinodesc.IdDestinoDesc
             INNER JOIN Destino destino  ON destinodesc.IdDestino = destino.IdDestino 
                      
             where peso.Estado='D' and DATE(peso.FechaHoraSal)>='$FechaInicio' and DATE(peso.FechaHoraSal)<='$FechaFin' 
             and  proveclien.RazonSocial like concat('%','$Busqueda','%') 
             
             order by peso.IdPeso Desc limit 15000;";


           }

           
         
            
            return EjecutarConsulta($Sql);

        }



        public function EscPedido($NumSemana){

           
      
           $Sql="SELECT sum(CantidadKG) as TotalPedidoSemana from Pedido where NumSemana=$NumSemana and EstadoP=1 and Estado=1;";


        
           
           return EjecutarConsulta($Sql);

       }


       public function EscPanel($NumSemana){

           
      
        $Sql="SELECT sum(PesoPanel) as TotalPesoPanel from Panel where NumSemana=$NumSemana and Estado=1;";


     
        
        return EjecutarConsulta($Sql);

    }







    


}




?>