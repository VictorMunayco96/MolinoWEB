<?php

require "../Config/Conexion.php";

    Class MConductor{

        public function __construct(){



        }

        public function Insertar($CodConduc, $DNI, $Licencia, $Nombre, $Apellidos, $Nacionalidad, $TipoBrevete, $Condicion, $Observacion){

            $Sql="Insert into Conductor (CodConduc, DNI, Licencia, Nombre, Apellidos, Nacionalidad, TipoBrevete, Condicion,Estado, Observacion) values('$CodConduc', '$DNI', '$Licencia', '$Nombre', '$Apellidos', '$Nacionalidad', '$TipoBrevete', '$Condicion', 1,'$Observacion')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdConductor, $CodConduc, $DNI, $Licencia, $Nombre, $Apellidos, $Nacionalidad, $TipoBrevete, $Condicion, $Observacion){

            $Sql=" Update Conductor set CodConduc='$CodConduc', 
            DNI='$DNI',Licencia='$Licencia', Nombre='$Nombre', Apellidos='$Apellidos', Nacionalidad='$Nacionalidad', TipoBrevete='$TipoBrevete', Condicion='$Condicion', Observacion='$Observacion' 
            where IdConductor='$IdConductor';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdConductor){

            $Sql=" Update Conductor set Estado=0 where IdConductor='$IdConductor';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdConductor){

            $Sql=" Update Conductor set Estado=1 where IdConductor='$IdConductor';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdConductor){

            $Sql="Select * from Conductor 
            where IdConductor='$IdConductor'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select * from Conductor";
            
            return EjecutarConsulta($Sql);

        }



        public function Select (){

            $Sql="Select * from Conductor where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}




?>