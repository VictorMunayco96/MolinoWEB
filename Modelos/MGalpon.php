<?php

require "../Config/Conexion.php";

    Class MGalpon{

        public function __construct(){



        }

        public function Insertar($Galpon,$CodGalpon,$IdDestinoBloq){

            $Sql="Insert into Galpon (Galpon,CodGalpon,Estado,IdDestinoBloq) values('$Galpon','$CodGalpon',1,'$IdDestinoBloq')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdGalpon,$Galpon,$CodGalpon,$IdDestinoBloq){

            $Sql=" Update Galpon set Galpon='$Galpon', 
            CodGalpon='$CodGalpon',IdDestinoBloq='$IdDestinoBloq' where IdGalpon='$IdGalpon';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdGalpon){

            $Sql=" Update Galpon set Estado=0 where IdGalpon='$IdGalpon';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdGalpon){

            $Sql=" Update Galpon set Estado=1 where IdGalpon='$IdGalpon';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdGalpon){

            $Sql="Select * from Galpon 
            where IdGalpon='$IdGalpon'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select G.IdGalpon, G.Galpon, G.CodGalpon, G.IdDestinoBloq, DB.DestinoBloq, G.Estado from Galpon G 
            inner join DestinoBloq DB on G.IdDestinoBloq=DB.IdDestinoBloq";
            
            return EjecutarConsulta($Sql);

        }




}
