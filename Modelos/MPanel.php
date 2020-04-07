<?php

require "../Config/Conexion.php";

    Class MPanel{

        public function __construct(){



        }

        public function Insertar($IdPedido, $CodProduccion, $NumSilo, $CantidadBatch, $PesoPanel, $IdUsuario, $NumSemana){

         
           
            $Sql="Insert into Panel (IdPedido, CodProduccion, NumSilo, CantidadBatch, PesoPanel, IdUsuario, Estado, NumSemana, Fecha) 
            values('$IdPedido', '$CodProduccion', '$NumSilo', '$CantidadBatch', '$PesoPanel', '$IdUsuario', '1', '$NumSemana', (select now()))";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdPanel,$IdPedido, $CodProduccion, $NumSilo, $CantidadBatch, $PesoPanel, $IdUsuario, $NumSemana){

            $Sql=" Update Panel set IdPedido='$IdPedido', CodProduccion='$CodProduccion', NumSilo='$NumSilo', CantidadBatch='$CantidadBatch', PesoPanel='$PesoPanel', IdUsuario='$IdUsuario', fecha=(select now())
             where IdPanel='$IdPanel';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdPanel){

            $Sql="Update Panel set Estado='0', CodProduccion=null where IdPanel='$IdPanel';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdPanel){

            $Sql=" Update Panel set Estado=1 where IdPanel='$IdPanel';";
            
            return EjecutarConsulta($Sql);

        }

        

        public function MostrarPedido($IdPedido){

            $Sql="Select * from Pedido  where IdPedido='$IdPedido'";
            return EjecutarConsultaSImpleFila($Sql);

        }


        public function MostrarPanel($IdPanel){

            $Sql="Select * from Panel  where IdPanel='$IdPanel'";
            return EjecutarConsultaSImpleFila($Sql);

        }


        public function ListarPedido ($IdCabeceraPedido, $NumSemana){

        

            $Sql=" SELECT P.IdPedido, DD.DestinoDes, DB.DestinoBloq, DP.DescProd,P.TipoTransporte, P.CantidadBatch, 
            ifnull((select sum(PA.CantidadBatch) from Panel PA where PA.IdPedido=P.IdPedido and Estado=1 and PA.NumSemana=$NumSemana  ),0) as Avance,  
            U.Usuario, P.Estado, P.EstadoP from Pedido P
            inner join PedidoSemanal PS on PS.IdPedidoSemanal=P.IdPedidoSemanal
            inner join DestinoBloq DB on DB.IdDestinoBloq=PS.IdDestinoBloq
            inner join DestinoDesc DD on DD.IdDestinoDesc=DB.IdDestinoDesc
            inner join Usuario U on U.IdUsuario=P.IdPedido 
            inner join DescProd DP on DP.IdDescProd=PS.IdDescProd
            where PS.IdCabeceraPedido=$IdCabeceraPedido;";
            
            return EjecutarConsulta($Sql);

        }


        public function ListarPanel (){

        

            $Sql="SELECT PA.IdPanel, PA.IdPedido,PA.CodProduccion ,DD.DestinoDes, PA.CantidadBatch, PA.NumSilo, PA.PesoPanel , PA.IdUsuario, U.Usuario as PAUsuario, PA.Fecha, PA.Estado, P.TipoTransporte, DP.DescProd  from Panel PA 
            inner join Pedido P on P.IdPedido=PA.IdPedido
            inner join PedidoSemanal PS on PS.IdPedidoSemanal=P.IdPedidoSemanal
            inner join DestinoBloq DB on DB.IdDestinoBloq=PS.IdDestinoBloq
            inner join DestinoDesc DD on DD.IdDestinoDesc=DB.IdDestinoDesc
            inner join DescProd DP on DP.IdDescProd=PS.IdDescProd
            inner join Usuario U on U.IdUsuario=PA.IdUsuario
             
             where PA.Estado=1 limit 100;";
            
            return EjecutarConsulta($Sql);

        }



        public function ListarCabeceraPedido($NumSemana){

            $Sql=" SELECT CP.IdCabeceraPedido,DestinoDes, CP.OrdenEnvio, 
            
            ifnull((select sum(P.CantidadBatch) from Pedido P
            inner join PedidoSemanal PS on PS.IdPedidoSemanal=P.IdPedidoSemanal 
            where P.Estado=1 and P.EstadoP=1 and P.NumSemana=$NumSemana and PS.IdCabeceraPedido=CP.IdCabeceraPedido),0) as Pedido, 
            
            ifnull((Select sum(PA.CantidadBatch) from Panel PA
            inner join Pedido P on P.IdPedido=PA.IdPedido
            inner join PedidoSemanal PS on PS.IdPedidoSemanal=P.IdPedidoSemanal
            where PA.Estado=1 and PS.IdCabeceraPedido=CP.IdCabeceraPedido and PA.NumSemana=$NumSemana),0) as Avance,
            CP.Estado
            
            
            from CabeceraPedido CP 
            inner join DestinoDesc DD on DD.IdDestinoDesc=CP.IdDestinoDesc order by CP.OrdenEnvio asc;
                                "
                                ;
            
            return EjecutarConsulta($Sql);

        }



        public function Select (){

            $Sql="Select * from DestinoDesc where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}
