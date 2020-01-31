<?php

require "../Config/Conexion.php";

    Class MProducto{

        public function __construct(){



        }

        public function Insertar($Producto,$CodProducto,$IdCategoriaProd,$NombreGuia){

            $Sql="Insert into Producto (Producto,CodProducto,Estado,IdCategoriaProd,NombreGuia) values('$Producto','$CodProducto',1,'$IdCategoriaProd','$NombreGuia')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdProducto,$Producto,$CodProducto,$IdCategoriaProd,$NombreGuia){

            $Sql=" Update Producto set Producto='$Producto', 
            CodProducto='$CodProducto',IdCategoriaProd='$IdCategoriaProd', NombreGuia='$NombreGuia' where IdPRoducto='$IdCategoriaProd';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdProducto){

            $Sql=" Update Producto set Estado=0 where IdProducto='$IdProducto';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdProducto){

            $Sql=" Update Producto set Estado=1 where IdProducto='$IdProducto';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdProducto){

            $Sql="Select * from Producto 
            where IdProducto='$IdProducto'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select P.IdProducto, P.Producto, P.NombreGuia,P.CodProducto, P.IdCategoriaProd, CP.CategoriaProd, P.Estado from Producto P 
            inner join CategoriaProd CP on P.IdCategoriaPRod=CP.IdCategoriaProd";
            
            return EjecutarConsulta($Sql);

        }

}




?>