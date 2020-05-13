<?php

require "../Config/Conexion.php";

    Class MConsultas{

        public function __construct(){



        }

       

     

        public function SalBalanzaFec($FechaInicio, $FechaFin, $Busqueda, $Filtro){

           
           if($Filtro=="PRODUCTO"){

            $Sql="SELECT
            P.IdPeso, 
            P.TipoMovimiento,
             P.NumGuia,
             P.FechaHoraSal,
             P.FechaHoraEnt,
             P.PesoCE,
             P.PesoCS,
             P.NetoC,
             P.ObservE,
             P.ObservS,
             P.IdUsuario,
             PC.RazonSocial,
             P.Precinto,
             V.Placa, 
             C.Nombre,
             C.Apellidos,
           D.Destino as Dest,
           DD.DestinoDes,
           DB.DestinoBloq,
             DP.DescProd
        FROM
             ProveClien PC INNER JOIN Peso P ON PC.IdProveClien = P.IdProveClien
             INNER JOIN ConductorVehiculo CV ON P.IdConductorVehiculo = CV.IdConductorVehiculo
             INNER JOIN DestinoBloq DB ON P.IdDestinobloq = DB.IdDestinobloq
             INNER JOIN DescProd DP ON P.IdDescProd = DP.IdDescProd
             INNER JOIN Conductor C ON CV.IdConductor = C.IdConductor
             INNER JOIN Vehiculo V ON CV.IdPlaca = V.IdPlaca
             INNER JOIN DestinoDesc DD  ON DB.IdDestinoDesc = DD.IdDestinoDesc
             INNER JOIN Destino D  ON DD.IdDestino = D.IdDestino 

                      
             where P.Estado='D' and P.FechaHoraSal>='$FechaInicio' and P.FechaHoraSal<='$FechaFin' 
             and  DP.DescProd like concat('%','$Busqueda','%') 
             
             order by P.IdPeso Desc limit 15000;";



           }
           
           if($Filtro=="DESTINO"){

            $Sql="SELECT
            P.IdPeso, 
            P.TipoMovimiento,
             P.NumGuia,
             P.FechaHoraSal,
             P.FechaHoraEnt,
             P.PesoCE,
             P.PesoCS,
             P.NetoC,
             P.ObservE,
             P.ObservS,
             P.IdUsuario,
             PC.RazonSocial,
             P.Precinto,
             V.Placa, 
             C.Nombre,
             C.Apellidos,
           D.Destino as Dest,
           DD.DestinoDes,
           DB.DestinoBloq,
             DP.DescProd
        FROM
             ProveClien PC INNER JOIN Peso P ON PC.IdProveClien = P.IdProveClien
             INNER JOIN ConductorVehiculo CV ON P.IdConductorVehiculo = CV.IdConductorVehiculo
             INNER JOIN DestinoBloq DB ON P.IdDestinobloq = DB.IdDestinobloq
             INNER JOIN DescProd DP ON P.IdDescProd = DP.IdDescProd
             INNER JOIN Conductor C ON CV.IdConductor = C.IdConductor
             INNER JOIN Vehiculo V ON CV.IdPlaca = V.IdPlaca
             INNER JOIN DestinoDesc DD  ON DB.IdDestinoDesc = DD.IdDestinoDesc
             INNER JOIN Destino D  ON DD.IdDestino = D.IdDestino 
                      
             where P.Estado='D' and P.FechaHoraSal>='$FechaInicio' and P.FechaHoraSal<='$FechaFin' 
             and  DD.DestinoDes like concat('%','$Busqueda','%') 
             
             order by P.IdPeso Desc limit 15000;";


           }

           if($Filtro=="PROVEEDOR"){

            $Sql="SELECT
            P.IdPeso, 
            P.TipoMovimiento,
             P.NumGuia,
             P.FechaHoraSal,
             P.FechaHoraEnt,
             P.PesoCE,
             P.PesoCS,
             P.NetoC,
             P.ObservE,
             P.ObservS,
             P.IdUsuario,
             PC.RazonSocial,
             P.Precinto,
             V.Placa, 
             C.Nombre,
             C.Apellidos,
           D.Destino as Dest,
           DD.DestinoDes,
           DB.DestinoBloq,
             DP.DescProd
        FROM
             ProveClien PC INNER JOIN Peso P ON PC.IdProveClien = P.IdProveClien
             INNER JOIN ConductorVehiculo CV ON P.IdConductorVehiculo = CV.IdConductorVehiculo
             INNER JOIN DestinoBloq DB ON P.IdDestinobloq = DB.IdDestinobloq
             INNER JOIN DescProd DP ON P.IdDescProd = DP.IdDescProd
             INNER JOIN Conductor C ON CV.IdConductor = C.IdConductor
             INNER JOIN Vehiculo V ON CV.IdPlaca = V.IdPlaca
             INNER JOIN DestinoDesc DD  ON DB.IdDestinoDesc = DD.IdDestinoDesc
             INNER JOIN Destino D  ON DD.IdDestino = D.IdDestino 

             where P.Estado='D' and P.FechaHoraSal>='$FechaInicio' and P.FechaHoraSal<='$FechaFin' 
             and  PC.RazonSocial like concat('%','$Busqueda','%') 
             
             order by P.IdPeso Desc limit 15000;";


           }

           if($Filtro=="CHOFER"){

            $Sql="SELECT
            P.IdPeso, 
            P.TipoMovimiento,
             P.NumGuia,
             P.FechaHoraSal,
             P.FechaHoraEnt,
             P.PesoCE,
             P.PesoCS,
             P.NetoC,
             P.ObservE AS ObservE,
             P.ObservS,
             P.IdUsuario,
             PC.RazonSocial,
             P.Precinto,
             V.Placa, 
             C.Nombre,
             C.Apellidos,
           D.Destino as Dest,
           DD.DestinoDes,
           DB.DestinoBloq,
             DP.DescProd
        FROM
             ProveClien PC INNER JOIN Peso P ON PC.IdProveClien = P.IdProveClien
             INNER JOIN ConductorVehiculo CV ON P.IdConductorVehiculo = CV.IdConductorVehiculo
             INNER JOIN DestinoBloq DB ON P.IdDestinobloq = DB.IdDestinobloq
             INNER JOIN DescProd DP ON P.IdDescProd = DP.IdDescProd
             INNER JOIN Conductor C ON CV.IdConductor = C.IdConductor
             INNER JOIN Vehiculo V ON CV.IdPlaca = V.IdPlaca
             INNER JOIN DestinoDesc DD  ON DB.IdDestinoDesc = DD.IdDestinoDesc
             INNER JOIN Destino D  ON DD.IdDestino = D.IdDestino 
                      
             where P.Estado='D' and P.FechaHoraSal>='$FechaInicio' and P.FechaHoraSal<='$FechaFin' 
             and   C.Nombre like concat('%','$Busqueda','%') 
             
             order by peso.IdPeso Desc limit 15000;";


           }

           if($Filtro=="TIPO_PRODUCTO"){

            $Sql="SELECT
            P.IdPeso, 
            P.TipoMovimiento,
             P.NumGuia,
             P.FechaHoraSal,
             P.FechaHoraEnt,
             P.PesoCE,
             P.PesoCS,
             P.NetoC,
             P.ObservE,
             P.ObservS,
             P.IdUsuario,
             PC.RazonSocial,
             P.Precinto,
             V.Placa, 
             C.Nombre,
             C.Apellidos,
           D.Destino as Dest,
           DD.DestinoDes,
           DB.DestinoBloq,
             DP.DescProd
        FROM
        ProveClien PC INNER JOIN Peso P ON PC.IdProveClien = P.IdProveClien
             INNER JOIN ConductorVehiculo CV ON P.IdConductorVehiculo = CV.IdConductorVehiculo
             INNER JOIN DestinoBloq DB ON P.IdDestinobloq = DB.IdDestinobloq
             INNER JOIN DescProd DP ON P.IdDescProd = DP.IdDescProd
             INNER JOIN Conductor C ON CV.IdConductor = C.IdConductor
             INNER JOIN Vehiculo V ON CV.IdPlaca = V.IdPlaca
             INNER JOIN DestinoDesc DD  ON DB.IdDestinoDesc = DD.IdDestinoDesc
             INNER JOIN Destino D  ON DD.IdDestino = D.IdDestino 
             INNER JOIN Producto PW on PW.IdProducto=DP.IdProducto
             INNER JOIN CategoriaProd CP on CP.IdCategoriaProd=PW.IdCategoriaProd
             INNER JOIN TipoProducto TP on TP.IdTipoProducto=CP.IdTipoProducto
                      
             where P.Estado='D' and P.FechaHoraSal>='$FechaInicio' and P.FechaHoraSal<='$FechaFin' 
             and  TP.TipoProducto like concat('%','$Busqueda','%') 
             
             order by P.IdPeso Desc limit 15000;";



           }





           
         
            
            return EjecutarConsulta($Sql);

        }



       /* public function EscPedido($NumSemana){

           
      
           $Sql="SELECT sum(CantidadKG) as TotalPedidoSemana from Pedido where NumSemana=$NumSemana and EstadoP=1 and Estado=1;";


        
           
           return EjecutarConsulta($Sql);

       }


       public function EscPanel($NumSemana){

           
      
        $Sql="SELECT sum(PesoPanel) as TotalPesoPanel from Panel where NumSemana=$NumSemana and Estado=1;";


     
        
        return EjecutarConsulta($Sql);

    }*/

/*
public function DestinoBatch(){

  $Sql="SELECT DD.DestinoDes,P.CantidadBatch from Pedido P 
  inner join Usuario U on U.IdUsuario=P.IdUsuario
  inner join PedidoSemanal PS on PS.IdPedidoSemanal=P.IdPedidoSemanal
  inner join DestinoBloq DB on DB.IdDestinoBloq=PS.IdDestinoBloq
  inner join DestinoDesc DD on DD.IdDestinoDesc=DB.IdDestinoDesc
             inner join DescProd DP on DP.IdDescProd=PS.IdDescProd ";


}*/
/*
public function EscPanel($NumSemana){

           
      
  $Sql="SELECT SUM(P.NetoC) AS NETOTOTAL FROM
ProveClien PC INNER JOIN Peso P ON PC.IdProveClien = P.IdProveClien
   INNER JOIN ConductorVehiculo CV ON P.IdConductorVehiculo = CV.IdConductorVehiculo
   INNER JOIN DestinoBloq DB ON P.IdDestinobloq = DB.IdDestinobloq
   INNER JOIN DescProd DP ON P.IdDescProd = DP.IdDescProd
   INNER JOIN Conductor C ON CV.IdConductor = C.IdConductor
   INNER JOIN Vehiculo V ON CV.IdPlaca = V.IdPlaca
   INNER JOIN DestinoDesc DD  ON DB.IdDestinoDesc = DD.IdDestinoDesc
   INNER JOIN Destino D  ON DD.IdDestino = D.IdDestino 
   INNER JOIN Producto PW on PW.IdProducto=DP.IdProducto
   INNER JOIN CategoriaProd CP on CP.IdCategoriaProd=PW.IdCategoriaProd
   INNER JOIN TipoProducto TP on TP.IdTipoProducto=CP.IdTipoProducto
            
   where P.Estado='D' and P.FechaHoraSal>='$FechaInicio' and P.FechaHoraSal<='$FechaFin' 
   and  TP.TipoProducto like concat('%','$Busqueda','%') 
   
   order by P.IdPeso Desc limit 15000;";
  
  return EjecutarConsulta($Sql);

}*/


public function DiferenciaPesos($NumSemana){


  $Sql="SELECT P.Producto,
ifnull((select (sum(PE.NetoC)/1000) from Peso PE 
inner join DescProd DP on DP.IdDescProd=PE.IdDescProd
inner join Producto PR on PR.IdProducto=DP.IdProducto where PR.IdProducto=P.IdProducto and PE.NumSemana='$NumSemana' and PE.Estado='D'),0) as PesoB,

ifnull((select (sum(PA.PesoPanel)/1000) from Panel PA 
inner join Pedido PED on PED.IdPedido=PA.IdPedido
inner join PedidoSemanal PEDS on PEDS.IdPedidoSemanal=PED.IdPedidoSemanal
inner join DescProd DP on DP.IdDescProd=PEDS.IdDescProd
inner join Producto PR on PR.IdProducto=DP.IdProducto where PR.IdProducto=P.IdProducto and PA.NumSemana='$NumSemana'),0) as PesoP,

ifnull((select Sum((PE.NetoC/1000)* (select Precio from Precio where IdDescProd=PE.IdDescProd and NumSemana='$NumSemana')) from Peso PE 
inner join DescProd DP on DP.IdDescProd=PE.IdDescProd
inner join Producto PR on PR.IdProducto=DP.IdProducto where PR.IdProducto=P.IdProducto and PE.NumSemana='$NumSemana'),0) as Costo


from Producto P inner join CategoriaProd CP on CP.IdCategoriaProd=P.IdCategoriaProd
inner join TipoProducto TP on TP.IdTipoProducto=CP.IdTipoProducto where TP.IdTipoProducto=1;";




return EjecutarConsulta($Sql);

}


    }

    






?>