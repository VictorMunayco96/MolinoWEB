<?php

require "../Config/Conexion.php";

    Class MDestinoBloq{

        public function __construct(){



        }

        public function Insertar($DestinoBloq,$CodDestinoBloq,$IdDestinoDesc){

            $Sql="Insert into DestinoBloq (DestinoBloq,CodDestinoBloq,Estado,IdDestinoDesc) values('$DestinoBloq','$CodDestinoBloq',1,'$IdDestinoDesc')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdDestinoBloq,$DestinoBloq,$CodDestinoBloq,$IdDestinoDesc){

            $Sql=" Update DestinoBloq set DestinoBloq='$DestinoBloq', 
            CodDestinoBloq='$CodDestinoBloq',IdDestinoDesc='$IdDestinoDesc' where IdDestinoBloq='$IdDestinoBloq';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdDestinoBloq){

            $Sql=" Update DestinoBloq set Estado=0 where IdDestinoBloq='$IdDestinoBloq';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdDestinoBloq){

            $Sql=" Update DestinoBloq set Estado=1 where IdDestinoBloq='$IdDestinoBloq';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdDestinoBloq){

            $Sql="Select * from DestinoBloq 
            where IdDestinoBloq='$IdDestinoBloq'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select DB.IdDestinoBloq, DB.DestinoBloq, DB.CodDestinoBloq, DB.IdDestinoDesc, DD.DestinoDes, DB.Estado from DestinoBloq DB 
            inner join DestinoDesc DD on DB.IdDestinoDesc=DD.IdDestinoDesc";
            
            return EjecutarConsulta($Sql);

        }


        public function Select (){

            $Sql="Select * from DestinoBloq where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }

        public function SelectBloqDesc ($IdCabeceraPedido){

            $Sql="SELECT DB.IdDestinoBloq, DB.DestinoBloq, DD.DestinoDes from DestinoBloq DB 
            inner join DestinoDesc DD on DD.IdDestinoDesc=DB.IdDestinoDesc where DB.IdDestinoDesc=(Select IdDestinoDesc from CabeceraPedido where IdCabeceraPedido=$IdCabeceraPedido) and DB.Estado=1;";
            
            return EjecutarConsulta($Sql);

        }

        public function SelectDescProdBal (){

            $Sql="Select DB.IdDestinoBloq, DB.DestinoBloq, DD.DestinoDes, D.Destino from Destino D  inner join (DestinoDesc DD  inner join DestinoBloq DB
            on DD.IdDestinoDesc=DB.IdDestinoDesc)
             on D.IdDestino=DD.IdDestino     where DB.Estado=1
            order by DB.IdDestinoBloq desc;";
            
            return EjecutarConsulta($Sql);

        }


}




?>