<?php

require "../Config/Conexion.php";

    Class MDestino{

        public function __construct(){



        }

        public function Insertar($Destino,$CodDestino,$IdTipoDestino){

            $Sql="Insert into Destino (Destino,CodDestino,Estado,IdTipoDestino) values('$Destino','$CodDestino',1,'$IdTipoDestino')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdDestino,$Destino,$CodDestino,$IdTipoDestino){

            $Sql=" Update Destino set Destino='$Destino', 
            CodDestino='$CodDestino',IdTipoDestino='$IdTipoDestino' where IdDestino='$IdDestino';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdDestino){

            $Sql=" Update Destino set Estado=0 where IdDestino='$IdDestino';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdDestino){

            $Sql=" Update Destino set Estado=1 where IdDestino='$IdDestino';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdDestino){

            $Sql="Select * from Destino 
            where IdDestino='$IdDestino'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select D.IdDestino, D.Destino, D.CodDestino, D.IdTipoDestino, TD.TipoDestino, D.Estado from Destino D 
            inner join TipoDestino TD on D.IdTipoDestino=TD.IdTipoDestino";
            
            return EjecutarConsulta($Sql);

        }


        public function Select (){

            $Sql="Select * from Destino where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}




?>