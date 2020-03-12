<?php

require "../Config/Conexion.php";

    Class MPedido{

        public function __construct(){



        }

        public function Insertar($IdCabeceraPedido, $CantidadBatch, $Observacion, $CantidadKG, $IdUsuario, $IdDescProd, $NumSemana){

         
           
            $Sql="Insert into Pedido (IdCabeceraPedido, CantidadBatch, Observacion, Fecha, Estado, CantidadKG, IdUsuario, IdDescProd, NumSemana, EstadoP) 
            values('$IdCabeceraPedido', '$CantidadBatch', '$Observacion', (select now()), '1', '$CantidadKG', '$IdUsuario', '$IdDescProd', '$NumSemana','0')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdPedido,$IdCabeceraPedido, $CantidadBatch, $Observacion, $CantidadKG, $IdUsuario, $IdDescProd, $NumSemana){

            $Sql=" Update Pedido set IdCabeceraPedido='$IdCabeceraPedido', CantidadBatch='$CantidadBatch', Observacion='$Observacion', Fecha='(select now())', CantidadKG='$CantidadKG', 
            IdUsuario='$IdUsuario', IdDescProd='$IdDescProd',  EstadoP='0', NumSemana='$NumSemana' 
             where IdPedido='$IdPedido';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdPedido){

            $Sql=" Update Pedido set Estado=0 where IdPedido='$IdPedido';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdPedido){

            $Sql=" Update Pedido set Estado=1 where IdPedido='$IdPedido';";
            
            return EjecutarConsulta($Sql);

        }

        public function Aceptar ($IdPedido){

            $Sql=" Update Pedido set EstadoP=1 where IdPedido='$IdPedido';";
            
            return EjecutarConsulta($Sql);

        }

        public function Rechazar ($IdPedido){

            $Sql=" Update Pedido set EstadoP=0 where IdPedido='$IdPedido';";
            
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

            $Sql="Select CP.IdCabeceraPedido, DD.DestinoDes,CP.TipoTransporte,CP.OrdenEnvio, CP.Estado,(select count(IdPedido) from pedido where EstadoP=0 and IdCabeceraPedido=CP.IdCabeceraPedido) as Pendiente from CabeceraPedido CP 
            inner join DestinoDesc DD on CP.IdDestinoDesc=DD.IdDestinoDesc";
            
            return EjecutarConsulta($Sql);

        }



        public function Select (){

            $Sql="Select * from DestinoDesc where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}
