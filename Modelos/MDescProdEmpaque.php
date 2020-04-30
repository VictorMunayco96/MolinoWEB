<?php

require "../Config/Conexion.php";

    Class MDescProdEmpaque{

        public function __construct(){



        }

        public function Insertar($IdDescProd, $Presentacion, $Paquete, $Unidad){

            $Sql="Insert into DescProdEmpaque (IdDescProd, Presentacion, Paquete, Unidad, Estado) values('$IdDescProd', '$Presentacion', '$Paquete', '$Unidad', 1)";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdDescProdEmpaque,$IdDescProd, $Presentacion, $Paquete, $Unidad){

            $Sql=" Update DescProdEmpaque set IdDescProd='$IdDescProd', 
            Presentacion='$Presentacion',Paquete='$Paquete', Unidad='$Unidad' where IdDescProdEmpaque='$IdDescProdEmpaque';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdDescProdEmpaque){

            $Sql=" Update DescProdEmpaque set Estado=0 where IdDescProdEmpaque='$IdDescProdEmpaque';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdDescProdEmpaque){

            $Sql=" Update DescProdEmpaque set Estado=1 where IdDescProdEmpaque='$IdDescProdEmpaque';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdDescProdEmpaque){

            $Sql="Select * from DescProdEmpaque 
            where IdDescProdEmpaque='$IdDescProdEmpaque'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="select DPE.IdDescProdEmpaque, DP.DescProd, DPE.Presentacion, DPE.Paquete, DPE.Unidad,DPE.Estado from DescProdEmpaque DPE inner join DescProd DP
            on DP.IdDescProd=DPE.IdDescProd order by IdDescProdEmpaque desc";
            
            return EjecutarConsulta($Sql);

        }

        public function Select (){

            $Sql="Select * from DescProdEmpaque where Estado = 1";
            
            return EjecutarConsulta($Sql);

        }

}




?>