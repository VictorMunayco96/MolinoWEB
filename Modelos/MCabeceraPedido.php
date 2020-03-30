<?php

require "../Config/Conexion.php";

    Class MCabeceraPedido{

        public function __construct(){



        }

        public function Insertar($IdDestinoDesc, $OrdenEnvio){

            $Sql="Insert into CabeceraPedido ( IdDestinoDesc,OrdenEnvio,Estado) 
            values('$IdDestinoDesc','$OrdenEnvio',1)";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdCabeceraPedido,$IdDestinoDesc,  $OrdenEnvio){

            $Sql=" Update CabeceraPedido set IdDestinoDesc='$IdDestinoDesc',OrdenEnvio='$OrdenEnvio' where IdCabeceraPedido='$IdCabeceraPedido';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdCabeceraPedido){

            $Sql=" Update CabeceraPedido set Estado=0 where IdCabeceraPedido='$IdCabeceraPedido';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdCabeceraPedido){

            $Sql=" Update CabeceraPedido set Estado=1 where IdCabeceraPedido='$IdCabeceraPedido';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdCabeceraPedido){

            $Sql="Select * from CabeceraPedido 
            where IdCabeceraPedido='$IdCabeceraPedido'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select CP.IdCabeceraPedido, DD.DestinoDes, CP.OrdenEnvio, CP.Estado  from CabeceraPedido CP 
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