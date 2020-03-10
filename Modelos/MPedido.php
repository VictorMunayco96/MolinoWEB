<?php

require "../Config/Conexion.php";

    Class MPedido{

        public function __construct(){



        }

        public function Insertar($IdCabeceraPedido, $CantidadBatch, $Observacion, $Fecha, $Estado, $CantidadKG, $IdUsuario, $IdDescProd, $NumSemana){

            $Sql="Insert into Pedido (IdCabeceraPedido, CantidadBatch, Observacion, Fecha, Estado, CantidadKG, IdUsuario, IdDescProd, NumSemana) 
            values('$IdCabeceraPedido', '$CantidadBatch', '$Observacion', '$Fecha', '1', '$CantidadKG', '$IdUsuario', '$IdDescProd', '$NumSemana')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdPedido,$IdCabeceraPedido, $CantidadBatch, $Observacion, $Fecha, $Estado, $CantidadKG, $IdUsuario, $IdDescProd, $NumSemana){

            $Sql=" Update Pedido set IdCabeceraPedido=$IdCabeceraPedido, CantidadBatch=$CantidadBatch, Observacion=$Observacion, Fecha=$Fecha, CantidadKG=$CantidadKG, 
            IdUsuario=$IdUsuario, IdDescProd=$IdDescProd, NumSemana=$NumSemana 
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

        public function Mostrar($IdPedido){

            $Sql="Select * from Pedido
            where IdPedido='$IdPedido'";
            return EjecutarConsultaSImpleFila($Sql);

        }

       // public function ListarPedido ($IdCabecera, $NumSemana){

            public function ListarPedido (){

            $Sql="SELECT
            pedido.`IdPedido` AS IdPedido,
            pedido.`IdCabeceraPedido` AS IdCabeceraPedido,
            pedido.`CantidadBatch` AS CantidadBatch,
            pedido.`Observacion` AS Observacion,
            pedido.`Fecha` AS Fecha,
            pedido.`Estado` AS Estado,
            pedido.`CantidadKG` AS CantidadKG,
            pedido.`IdUsuario` AS IdUsuario,
            pedido.`IdDescProd` AS IdDescProd,
            pedido.`NumSemana` AS NumSemana,
            cabecerapedido.`IdDestinoDesc` AS IdDestinoDesc,
            usuario.`Usuario` AS Usuario,
            descprod.`DescProd` AS DescProd,
            destinodesc.`DestinoDes` AS DestinoDes,
            cabecerapedido.`TipoTransporte` AS TipoTransporte
       FROM
            `cabecerapedido` cabecerapedido INNER JOIN `pedido` pedido ON cabecerapedido.`IdCabeceraPedido` = pedido.`IdCabeceraPedido`
            INNER JOIN `usuario` usuario ON pedido.`IdUsuario` = usuario.`IdUsuario`
            INNER JOIN `descprod` descprod ON pedido.`IdDescProd` = descprod.`IdDescProd`
            INNER JOIN `destinodesc` destinodesc ON cabecerapedido.`IdDestinoDesc` = destinodesc.`IdDestinoDesc`";
          //  where IdCabeceraPedido='$IdCabecera' and NumSemana='$NumSemana'";
            
            return EjecutarConsulta($Sql);

        }

        public function ListarCabeceraPedido(){

            $Sql="Select CP.IdCabeceraPedido, DD.DestinoDes,CP.TipoTransporte,CP.OrdenEnvio, CP.Estado  from CabeceraPedido CP 
            inner join DestinoDesc DD on CP.IdDestinoDesc=DD.IdDestinoDesc";
            
            return EjecutarConsulta($Sql);

        }



        public function Select (){

            $Sql="Select * from DestinoDesc where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}
