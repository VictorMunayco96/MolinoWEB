<?php

require "../Config/Conexion.php";

    Class MEmpleado{

        public function __construct(){



        }

        public function Insertar($DNI, $Codigo, $NombreE, $ApellidosE, $Telefono, $Celular, $FechaIngreso){

            $Sql="Insert into Empleado (DNI, Codigo, NombreE, ApellidosE, Telefono, Celular, FechaIngreso, Estado) values('$DNI', '$Codigo', '$NombreE', '$ApellidosE', '$Telefono', '$Celular', '$FechaIngreso','1')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdEmpleado,$DNI, $Codigo, $NombreE, $ApellidosE, $Telefono, $Celular, $FechaIngreso){

            $Sql=" Update Empleado set DNI='$DNI', Codigo='$Codigo', NombreE='$NombreE', ApellidosE='$ApellidosE', Telefono='$Telefono', 
            Celular='$Celular' , FechaIngreso='$FechaIngreso' where IdEmpleado='$IdEmpleado';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdEmpleado){

            $Sql=" Update Empleado set Estado=0 where IdEmpleado='$IdEmpleado';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdEmpleado){

            $Sql=" Update Emplead set  Estado=1 where IdTipoDestino='$IdTipoDestino';";
            
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