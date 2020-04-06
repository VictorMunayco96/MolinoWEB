<?php

require "../Config/Conexion.php";

    Class MPedidoSemanal{

        public function __construct(){



        }

        public function Insertar($IdCabeceraPedido, $IdDescProd, $CantidadBatch, $CantidadKG, $NumSemana, $Observacion, $IdUsuario,$IdDestinoBloq ){

            $Sql="Insert into PedidoSemanal ( IdCabeceraPedido, IdDescProd, CantidadBatch, CantidadKG, NumSemana, Observacion, IdUsuario, EstadoPS, Estado,Fecha,IdDestinoBloq) 
            values($IdCabeceraPedido, $IdDescProd, $CantidadBatch, $CantidadKG, $NumSemana, '$Observacion', $IdUsuario, 0, 1,(Select Now()),$IdDestinoBloq);";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdPedidoSemanal,$IdCabeceraPedido, $IdDescProd, $CantidadBatch, $CantidadKG, $NumSemana, $Observacion, $IdUsuario){

            $Sql=" Update PedidoSemanal set IdCabeceraPedido='$IdCabeceraPedido', IdDescProd='$IdDescProd', CantidadBatch='$CantidadBatch', CantidadKG='$CantidadKG', NumSemana='$NumSemana', Observacion='$Observacion', IdUsuario='$IdUsuario'
             where IdPedidoSemanal='$IdPedidoSemanal';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdPedidoSemanal){

            $Sql=" Update PedidoSemanal set Estado=0 where IdPedidoSemanal='$IdPedidoSemanal';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdPedidoSemanal){

            $Sql=" Update PedidoSemanal set Estado=1 where IdPedidoSemanal='$IdPedidoSemanal';";
            
            return EjecutarConsulta($Sql);

        }


        public function Aceptar ($IdPedidoSemanal){

            $Sql=" Update PedidoSemanal set EstadoPS=1 where IdPedidoSemanal='$IdPedidoSemanal';";
            
            return EjecutarConsulta($Sql);

        }

        public function Rechazar ($IdPedidoSemanal){

            $Sql=" Update PedidoSemanal set EstadoPS=0 where IdPedidoSemanal='$IdPedidoSemanal';";
            
            return EjecutarConsulta($Sql);

        }



        public function Mostrar($IdPedidoSemanal){

            $Sql="Select * from PedidoSemanal 
            where IdPedidoSemanal='$IdPedidoSemanal'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function ListarCabeceraPedido($NumSemana){

            $Sql="SELECT CP.IdCabeceraPedido, CP.IdDestinoDesc, DD.DestinoDes,CP.OrdenEnvio, ifnull((Select Sum(PS.CantidadBatch) from PedidoSemanal PS where PS.EstadoPS=1 and PS.Estado=1 and PS.IdCabeceraPedido=CP.IdCabeceraPedido and PS.NumSemana=$NumSemana),0) as TotalMezclas,
            (Select count(PS.EstadoPS) from PedidoSemanal PS where EstadoPS=0 and Estado=1 and PS.IdCabeceraPedido=CP.IdCabeceraPedido) as Pendiente, CP.Estado        
            from CabeceraPedido CP
            inner join DestinoDesc DD on DD.IdDestinoDesc=CP.IdDestinoDesc where CP.Estado=1; ";

            return EjecutarConsulta($Sql);

        }


        public function ListarPedidoSemanal($IdCabeceraPedido,$NumSemana){

            $Sql="            SELECT PS.IdPedidoSemanal,DD.DestinoDes, DB.DestinoBloq ,DP.DescProd, PS.CantidadBatch, PS.CantidadKG, PS.Observacion, PS.Fecha, PS.EstadoPS, U.Usuario,PS.Estado from PedidoSemanal PS 
            inner join Usuario U on U.IdUsuario=PS.IdUsuario
            inner join DescProd DP on DP.IdDescProd=PS.IdDescProd
            inner join CabeceraPedido CP on CP.IdCabeceraPedido=PS.IdCabeceraPedido
            inner join DestinoBloq DB on DB.IdDestinoBloq=PS.IdDestinoBloq
            inner join DestinoDesc DD on DD.IdDestinoDesc=CP.IdDestinoDesc where PS.NumSemana='$NumSemana' and PS.IdCabeceraPedido='$IdCabeceraPedido';  ";

            return EjecutarConsulta($Sql);

        }



        /*--------------------------------------------------------------FALTA REVISAR */
       
      

}




?>