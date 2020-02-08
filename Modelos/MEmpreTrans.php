<?php

require "../Config/Conexion.php";

    Class MEmpreTrans{

        public function __construct(){



        }

        public function Insertar($Ruc, $RazonSocial, $Domicilio, $Correo, $NumCel, $Condicion, $Observ){

            $Sql="Insert into EmpreTrans (Ruc, RazonSocial, Domicilio, Correo, NumCel, Condicion, Estado, Observ) values('$Ruc', '$RazonSocial', '$Domicilio', '$Correo', '$NumCel', '$Condicion',1 ,'$Observ')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdEmpreTrans, $Ruc, $RazonSocial, $Domicilio, $Correo, $NumCel, $Condicion, $Observ){

            $Sql=" Update EmpreTrans set Ruc='$Ruc', 
            RazonSocial='$RazonSocial',Domicilio='$Domicilio', Correo='$Correo', NumCel='$NumCel', Condicion='$Condicion', Observ='$Observ' 
            where IdEmpreTrans='$IdEmpreTrans';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdEmpreTrans){

            $Sql=" Update EmpreTrans set Estado=0 where IdEmpreTrans='$IdEmpreTrans';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdEmpreTrans){

            $Sql=" Update EmpreTrans set Estado=1 where IdEmpreTrans='$IdEmpreTrans';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdEmpreTrans){

            $Sql="Select * from EmpreTrans 
            where IdEmpreTrans='$IdEmpreTrans'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select * from EmpreTrans";
            
            return EjecutarConsulta($Sql);

        }



        public function Select(){

            $Sql="Select * from EmpreTrans where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}




?>