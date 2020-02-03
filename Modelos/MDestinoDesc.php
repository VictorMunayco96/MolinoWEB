<?php

require "../Config/Conexion.php";

    Class MDestinoDesc{

        public function __construct(){



        }

        public function Insertar($DestinoDes,$CodDestinoDesc,$IdDestino){

            $Sql="Insert into DestinoDesc (DestinoDes,CodDestinoDesc,Estado,IdDestino) values('$DestinoDes','$CodDestinoDesc',1,'$IdDestino')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdDestinoDesc,$DestinoDes,$CodDestinoDesc,$IdDestino){

            $Sql=" Update DestinoDesc set DestinoDes='$DestinoDes', 
            CodDestinoDesc='$CodDestinoDesc',IdDestino='$IdDestino' where IdDestinoDesc='$IdDestinoDesc';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdDestinoDesc){

            $Sql=" Update DestinoDesc set Estado=0 where IdDestinoDesc='$IdDestinoDesc';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdDestinoDesc){

            $Sql=" Update DestinoDesc set Estado=1 where IdDestinoDesc='$IdDestinoDesc';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdDestinoDesc){

            $Sql="Select * from DestinoDesc 
            where IdDestinoDesc='$IdDestinoDesc'";
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
