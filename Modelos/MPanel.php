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

            $Sql=" Update Panel set Estado=0 where IdPanel='$IdPanel';";
            
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

        

            $Sql="SELECT
            P.IdPedido,
            P.IdCabeceraPedido,
            P.CantidadBatch,
            P.Observacion,
            P.Fecha,
            P.Estado as PEstado,
            P.CantidadKG,
            P.IdUsuario,
            P.IdDescProd,
            P.NumSemana,
            CP.IdDestinoDesc,
            U.Usuario,
            DP.DescProd,
            DD.DestinoDes,
            CP.TipoTransporte,
            P.EstadoP,
            ifnull((P.CantidadBatch-(select sum(PA.CantidadBatch) from Panel PA where PA.IdPedido=P.IdPedido and PA.Estado=1)),P.CantidadBatch) as Restante
       FROM 
            cabecerapedido CP INNER JOIN pedido P ON CP.IdCabeceraPedido = P.IdCabeceraPedido
            INNER JOIN usuario U ON P.IdUsuario = U.IdUsuario
            INNER JOIN descprod DP ON P.IdDescProd = DP.IdDescProd
            INNER JOIN destinodesc DD ON CP.IdDestinoDesc = DD.IdDestinoDesc
            where P.IdCabeceraPedido='$IdCabeceraPedido' and P.NumSemana='$NumSemana' and P.EstadoP=1";
            
            return EjecutarConsulta($Sql);

        }


        public function ListarPanel (){

        

            $Sql="SELECT PA.IdPanel, PA.IdPedido,PA.CodProduccion ,DD.DestinoDes, PA.CantidadBatch, PA.NumSilo, PA.PesoPanel , U.IdUsuario, U.Usuario, PA.Fecha, PA.Estado, CP.TipoTransporte, DP.DescProd  from Panel PA 

            inner join Pedido P on PA.IdPedido=P.IdPEdido
            inner join DescProd DP on P.IdDescProd=DP.IdDescProd
            inner join CabeceraPedido CP on P.IdCabeceraPedido=CP.IdCabeceraPedido
            inner join DestinoDesc DD on CP.IdDestinoDesc=DD.IdDestinoDesc
            inner join Usuario U on P.IdUsuario=U.IdUsuario where PA.Estado=1 order by PA.IdPanel desc";
            
            return EjecutarConsulta($Sql);

        }



        public function ListarCabeceraPedido(){

            $Sql=" SELECT CP.IdCabeceraPedido, DD.DestinoDes,CP.TipoTransporte,CP.OrdenEnvio, CP.Estado,
            ifnull((select sum(CantidadBatch)- (select sum(PA.CantidadBatch) 
            from Pedido P inner join Panel PA on P.IdPedido=PA.IdPedido where P.IdCabeceraPedido=CP.IdCabeceraPedido)
            
            from pedido where EstadoP=1 and IdCabeceraPedido=CP.IdCabeceraPedido and Estado=1),
            
            (select sum(CantidadBatch) from pedido where EstadoP=1 and IdCabeceraPedido=CP.IdCabeceraPedido and Estado=1)
            
            ) as Pendiente from CabeceraPedido CP 
                        inner join DestinoDesc DD on CP.IdDestinoDesc=DD.IdDestinoDesc;";
            
            return EjecutarConsulta($Sql);

        }



        public function Select (){

            $Sql="Select * from DestinoDesc where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}
