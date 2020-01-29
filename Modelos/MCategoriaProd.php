<?php

require "../Config/Conexion.php";

    Class MCategoriaProd{

        public function __construct(){



        }

        public function Insertar($CategoriaProd,$CodCategoria,$IdTipoProducto){

            $Sql="Insert into CategoriaProd (CategoriaProd,CodCategoria,Estado,IdTipoProducto) values('$CategoriaProd','$CodCategoria','1','$IdTipoProducto')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdCategoriaProd,$CategoriaProd,$CodCategoria,$IdTipoProducto){

            $Sql=" Update CategoriaProd set CategoriaProd='$CategoriaProd', 
            CodCategoria='$CodCategoria',IdTipoProducto='$IdTipoProducto' where IdCategoriaProd='$IdCategoriaProd';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdCategoriaProd){

            $Sql=" Update CategoriaProd set Estado=0 where IdCategoriaProd='$IdCategoriaProd';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdTipoProducto){

            $Sql=" Update CategoriaProd set Estado=1 where IdCategoriaProd='$IdCategoriaProd';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdTipoProducto){

            $Sql="Select * from CategoriaProd 
            where IdCategoriaProd='$IdCategoriaProd'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select CP.IdCategoriaProd,CP.CategoriaProd,CP.CodCategoria,CP.IdTipoProducto,TP.TipoProducto,CP.Estado  from CategoriaProd CP 
            inner join TipoProducto TP on CP.IdTipoProducto=TP.IdTipoProducto";
            
            return EjecutarConsulta($Sql);

        }

}




?>