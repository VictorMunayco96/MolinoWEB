<?php

require "../Config/Conexion.php";

    Class MUsuario{

        public function __construct(){



        }

        public function Insertar($Usuario, $Contrasena, $TipoUsuario, $IdEmpleado){

            $Sql="Insert into Usuario (Usuario, Contrasena, TipoUsuario, IdEmpleado, Estado) values('$Usuario', '$Contrasena', '$TipoUsuario', '$IdEmpleado',1)";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdUsuario,$Usuario, $Contrasena, $TipoUsuario, $IdEmpleado){

            $Sql=" Update Usuario set Usuario='$Usuario', 
            Contrasena='$Contrasena', TipoUsuario='$TipoUsuario', IdEmpleado='$IdEmpleado' where IdUsuario='$IdUsuario';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdUsuario){

            $Sql=" Update Usuario set Estado=0 where IdUsuario='$IdUsuario';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdUsuario){

            $Sql=" Update Usuario set Estado=1 where IdUsuario='$IdUsuario';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdUsuario){

            $Sql="Select * from Usuario 
            where IdUsuario='$IdUsuario'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select U.IdUsuario, U.Usuario, U.Contrasena, U.TipoUsuario,U.IdEmpleado,E.NombreE,E.ApellidosE,U.Estado from Usuario U
            inner join Empleado E on U.IdEmpleado=E.IdEmpleado";
            
            return EjecutarConsulta($Sql);

        }




}




?>