<?php

require "../Config/Conexion.php";

    Class MDescProd{

        public function __construct(){



        }

        public function Insertar($DescProd,$CodDescProd,$IdProducto){

            $Sql="Insert into DescProd (DescProd,CodDescProd,Estado,IdProducto) values('$DescProd','$CodDescProd',1,$IdProducto)";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdDescProd,$DescProd,$CodDescProd,$IdProducto){

            $Sql=" Update DescProd set DescProd='$DescProd', 
            CodDescProd='$CodDescProd',IdProducto='$IdProducto' where IdDescProd='$IdDescProd';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdDescProd){

            $Sql=" Update DescProd set Estado=0 where IdDescProd='$IdDescProd';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdDescProd){

            $Sql=" Update DescProd set Estado=1 where IdDescProd='$IdDescProd';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdDescProd){

            $Sql="Select * from DescProd 
            where IdDescProd='$IdDescProd'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select DP.IdDescProd, DP.DescProd, DP.CodDescProd, DP.IdProducto, P.Producto, DP.Estado from DescProd DP 
            inner join Producto P on DP.IdProducto=P.IdProducto";
            
            return EjecutarConsulta($Sql);

        }

}




?>