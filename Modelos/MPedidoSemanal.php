<?php

require "../Config/Conexion.php";

    Class MPedidoSemanal{

        public function __construct(){



        }

        public function Insertar($IdCabeceraPedido, $IdDescProd, $CantidadBatch, $CantidadKG, $NumSemana, $Observacion, $IdUsuario ){

            $Sql="Insert into PedidoSemanal ( IdCabeceraPedido, IdDescProd, CantidadBatch, CantidadKG, NumSemana, Observacion, IdUsuario, EstadoPS, Estado,Fecha) 
            values($IdCabeceraPedido, $IdDescProd, $CantidadBatch, $CantidadKG, $NumSemana, $Observacion, $IdUsuario, '0', '1',(Select Now())";

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

        public function Mostrar($IdPedidoSemanal){

            $Sql="Select * from PedidoSemanal 
            where IdPedidoSemanal='$IdPedidoSemanal'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select P.IdCabeceraPedido, DD.DestinoDes, CP.OrdenEnvio, CP.Estado  from CabeceraPedido CP 
            inner join DestinoDesc DD on CP.IdDestinoDesc=DD.IdDestinoDesc";
            
            return EjecutarConsulta($Sql);

        }

        public function Select (){

            $Sql="Select CP.IdCabeceraPedido, DD.DestinoDes,CP.OrdenEnvio, CP.Estado  from CabeceraPedido CP 
            inner join DestinoDesc DD on CP.IdDestinoDesc=DD.IdDestinoDesc where CP.Estado=1";
            
            return EjecutarConsulta($Sql);

        }

}




?>