<?php

require "../Config/Conexion.php";

    Class MConductorVehiculo{

        public function __construct(){



        }

        public function Insertar($IdPlaca, $IdConductor){

            $Sql="Insert into ConductorVehiculo(Fecha, IdPlaca, IdConductor, Estado) values((select now()),'$IdPlaca','$IdConductor',1)";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdConductorVehiculo,$IdPlaca, $IdConductor){

            $Sql=" Update ConductorVehiculo set IdPlaca='$IdPlaca', 
            IdConductor='$IdConductor' where IdConductorVehiculo='$IdConductorVehiculo';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdConductorVehiculo){

            $Sql=" Update ConductorVehiculo set Estado=0 where IdConductorVehiculo='$IdConductorVehiculo';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdConductorVehiculo){

            $Sql=" Update ConductorVehiculo set Estado=1 where IdConductorVehiculo='$IdConductorVehiculo';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdConductorVehiculo){

            $Sql="Select * from DescProd 
            where IdConductorVehiculo='$IdConductorVehiculo'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select CV.IdConductorVehiculo, CV.Fecha, CV.IdPlaca, V.Placa, ET.RazonSocial as Razon_Social, CV.IdConductor, C.Nombre, C.Apellidos, CV.Estado   from Conductor C 
            inner join (ConductorVehiculo CV inner join (Vehiculo V 
            inner join EmpreTrans ET on V.IdEmpreTrans=ET.IdEmpreTrans) on CV.IdPlaca=V.IdPlaca) on C.IdConductor=CV.IdConductor; ";
            
            return EjecutarConsulta($Sql);

        }


        public function Select(){

            $Sql="select CV.IdConductorVehiculo, C.Nombre,C.Apellidos, V.Placa from ConductorVehiculo CV inner join
            Vehiculo V on V.IdPlaca=CV.IdPlaca
            inner join Conductor C on C.IdConductor=CV.IdConductor where CV.Estado=1;";
            
            return EjecutarConsulta($Sql);

        }

}




?>