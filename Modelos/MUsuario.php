<?php

require "../Config/Conexion.php";

    Class MUsuario{

        public function __construct(){



        }

        public function Insertar($Usuario, $Contrasena, $TipoUsuario, $IdEmpleado,$Permiso){

            $Sql="Insert into Usuario (Usuario, Contrasena, TipoUsuario, IdEmpleado, Estado) values('$Usuario', '$Contrasena', '$TipoUsuario', '$IdEmpleado',1)";

           // return EjecutarConsulta($Sql);
           $IdUsuarioNew=EjecutarConsulta_RetornarID($Sql);

           $Num_Elementos=0;

           $Sw=true;

           while($Num_Elementos< count($Permiso)){

            $Sql_Detalle = "Insert into UsuarioPermiso(IdUsuario, IdPermiso) values ('$IdUsuarioNew','$Permiso[$Num_Elementos]')";

            EjecutarConsulta($Sql_Detalle) or $Sw = false;

            $Num_Elementos=$Num_Elementos+1;

           }

           return $Sw;

        }       
        
        public function Editar($IdUsuario,$Usuario, $Contrasena, $TipoUsuario, $IdEmpleado,$Permiso){

            $Sql=" Update Usuario set Usuario='$Usuario', 
            Contrasena='$Contrasena', TipoUsuario='$TipoUsuario', IdEmpleado='$IdEmpleado' where IdUsuario='$IdUsuario';";
            
            EjecutarConsulta($Sql);

            //ELIMINAR TODOS REGISTROS ASIGNADOS
             $SqlDel="delete from UsuarioPermiso where IdUsuario='$IdUsuario'";

             EjecutarConsulta($SqlDel);

             //INGRESAR PERMISOS

             $Num_Elementos=0;

             $Sw=true;
  
             while($Num_Elementos< count($Permiso)){
  
              $Sql_Detalle = "Insert into UsuarioPermiso(IdUsuario, IdPermiso) values ('$IdUsuario','$Permiso[$Num_Elementos]')";
  
              EjecutarConsulta($Sql_Detalle) or $Sw = false;
  
              $Num_Elementos=$Num_Elementos+1;
  
             }
  
             return $Sw;


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

public function ListarMarcados($IdUsuario){

$Sql="Select * from UsuarioPermiso where IdUsuario='$IdUsuario'";
return EjecutarConsulta($Sql);

}


}




?>