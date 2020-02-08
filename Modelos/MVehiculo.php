<?php

require "../Config/Conexion.php";

    Class MVehiculo{

        public function __construct(){



        }

        public function Insertar($Placa, $Marca, $Compartimientos, $IdEmpreTrans){

            $Sql="Insert into Vehiculo (Placa, Marca, Compartimientos, IdEmpreTrans, Estado) values('$Placa', '$Marca', '$Compartimientos', '$IdEmpreTrans',1)";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdPlaca, $Placa, $Marca, $Compartimientos, $IdEmpreTrans){

            $Sql=" Update Vehiculo set Placa='$Placa', 
            Marca='$Marca', Compartimientos='$Compartimientos', IdEmpreTrans='$IdEmpreTrans' where IdPlaca='$IdPlaca';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdPlaca){

            $Sql=" Update Vehiculo set Estado=0 where IdPlaca='$IdPlaca';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdPlaca){

            $Sql=" Update Vehiculo set Estado=1 where IdPlaca='$IdPlaca';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdPlaca){

            $Sql="Select * from Vehiculo 
            where IdPlaca='$IdPlaca'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select V.IdPlaca, V.Placa, V.Marca, V.Compartimientos, V.IdEmpreTrans, ET.RazonSocial, V.Estado from Vehiculo V 
            inner join EmpreTrans ET on V.IdEmpreTrans=ET.IdEmpreTrans";
            
            return EjecutarConsulta($Sql);

        }


        public function Select (){

            $Sql="Select * from Vehiculo where Estado=1;";
            
            return EjecutarConsulta($Sql);

        }


}




?>