<?php

require "../Config/Conexion.php";

    Class MDestinoDesc{

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

        public function Listar (){

            $Sql="Select DD.IdDestinoDesc, DD.DestinoDes, DD.CodDestinoDesc, DD.IdDestino, D.Destino, DD.Estado from DestinoDesc DD 
            inner join Destino D on DD.IdDestino=D.IdDestino";
            
            return EjecutarConsulta($Sql);

        }


        public function Select (){

            $Sql="Select * from DestinoDesc where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}
