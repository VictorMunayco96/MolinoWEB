<?php

require "../Config/Conexion.php";

    Class MProveClien{

        public function __construct(){



        }

        public function Insertar($RazonSocial, $Ruc){

            $Sql="Insert into ProveClien (RazonSocial, Ruc, Estado) values('$RazonSocial','$Ruc',1)";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdProveClien,$RazonSocial, $Ruc){

            $Sql=" Update ProveClien set RazonSocial='$RazonSocial', 
            Ruc='$Ruc' where IdProveClien='$IdProveClien';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdProveClien){

            $Sql=" Update ProveClien set Estado=0 where IdProveClien='$IdProveClien';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdProveClien){

            $Sql=" Update ProveClien set Estado=1 where IdProveClien='$IdProveClien';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdProveClien){

            $Sql="Select * from ProveClien 
            where IdProveClien='$IdProveClien'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select * from ProveClien";
            
            return EjecutarConsulta($Sql);

        }


        public function Select (){

            $Sql="Select * from ProveClien where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}




?>