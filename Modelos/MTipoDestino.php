<?php

require "../Config/Conexion.php";

    Class MTipoDestino{

        public function __construct(){



        }

        public function Insertar($TipoDestino,$CodDestino){

            $Sql="Insert into TipoDestino (TipoDestino, CodDestino, Estado) values('$TipoDestino','$CodDestino','1')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdTipoDestino,$TipoDestino,$CodDestino){

            $Sql=" Update TipoDestino set TipoDestino='$TipoDestino', 
            CodDestino='$CodDestino' where IdTipoDestino='$IdTipoDestino';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdTipoDestino){

            $Sql=" Update TipoDestino set Estado=0 where IdTipoDestino='$IdTipoDestino';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdTipoDestino){

            $Sql=" Update TipoDestino set  Estado=1 where IdTipoDestino='$IdTipoDestino';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdTipoDestino){

            $Sql="Select * from TipoDestino where IdTipoDestino='$IdTipoDestino'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select * from TipoDestino;";
            
            return EjecutarConsulta($Sql);

        }


        public function Select (){

            $Sql="Select * from TipoDestino where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }



}




?>