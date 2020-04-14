<?php

require "../Config/Conexion.php";

    Class MPrecio{

        public function __construct(){



        }

        public function Insertar($Precio, $NumSemana, $IdDescProd){

            $Sql="Insert into Precio (Precio,NumSemana,IdDescProd,Estado) values('$Precio','$NumSemana','$IdDescProd',1)";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdPrecio,$Precio, $NumSemana, $IdDescProd){

            $Sql=" Update Precio set Precio='$Precio', 
            NumSemana='$NumSemana',IdDescProd='$IdDescProd' where IdPrecio='$IdPrecio';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdPrecio){

            $Sql=" Update Precio set Estado=0 where IdPrecio='$IdPrecio';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdPrecio){

            $Sql=" Update Precio set Estado=1 where IdPrecio='$IdPrecio';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdPrecio){

            $Sql="Select * from Precio 
            where IdPrecio='$IdPrecio'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select P.IdPrecio, P.Precio, P.NumSemana, DP.DescProd, P.Estado from Precio P 
            inner join DescProd DP on DP.IdDescProd=P.IdDescProd";
            
            return EjecutarConsulta($Sql);

        }


}




?>