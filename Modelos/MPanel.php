<?php

require "../Config/Conexion.php";

    Class MPanel{

        public function __construct(){



        }

        public function Insertar($IdPedido, $CodProduccion, $NumSilo, $CantidadBatch, $PesoPanel, $IdUsuario, $NumSemana){

         
           
            $Sql="Insert into Panel (IdPedido, CodProduccion, NumSilo, CantidadBatch, PesoPanel, IdUsuario, Estado, NumSemana, Fecha) 
            values('$IdPedido', '$CodProduccion', '$NumSilo', '$CantidadBatch', '$PesoPanel', '$IdUsuario', '$Estado', '$NumSemana', '$Fecha')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdPedido, $CodProduccion, $NumSilo, $CantidadBatch, $PesoPanel, $IdUsuario, $NumSemana){

            $Sql=" Update Panel set IdPedido='$IdPedido', CodProduccion='$CodProduccion', NumSilo='$NumSilo', CantidadBatch='$CantidadBatch', PesoPanel='$PesoPanel', IdUsuario='$IdUsuario', NumSemana='$NumSemana'
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

        

        public function Mostrar($IdPedido){

            $Sql="Select * from Pedido
            where IdPedido='$IdPedido'";
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
            P.EstadoP
       FROM 
            cabecerapedido CP INNER JOIN pedido P ON CP.IdCabeceraPedido = P.IdCabeceraPedido
            INNER JOIN usuario U ON P.IdUsuario = U.IdUsuario
            INNER JOIN descprod DP ON P.IdDescProd = DP.IdDescProd
            INNER JOIN destinodesc DD ON CP.IdDestinoDesc = DD.IdDestinoDesc
            where P.IdCabeceraPedido='$IdCabeceraPedido' and P.NumSemana='$NumSemana'";
            
            return EjecutarConsulta($Sql);

        }

        public function ListarCabeceraPedido(){

            $Sql="Select CP.IdCabeceraPedido, DD.DestinoDes,CP.TipoTransporte,CP.OrdenEnvio, CP.Estado,(select count(IdPedido) from pedido where EstadoP=0 and IdCabeceraPedido=CP.IdCabeceraPedido and Estado=1) as Pendiente from CabeceraPedido CP 
            inner join DestinoDesc DD on CP.IdDestinoDesc=DD.IdDestinoDesc";
            
            return EjecutarConsulta($Sql);

        }



        public function Select (){

            $Sql="Select * from DestinoDesc where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}
