<?php

require "../Config/Conexion.php";

    Class MAlmacenEntrada{

        public function __construct(){



        }

        public function Insertar($IdDescProdEmpaque, $Lote, $Cantidad, $Placa, $IdUsuario){

            $Sql="Insert into AlmacenEntrada(IdDescProdEmpaque, Lote, Cantidad, Fecha, Placa, EstadoL, Estado, IdUsuario) values('$IdDescProdEmpaque', '$Lote', '$Cantidad', (select now()), '$Placa', 1,1,'$IdUsuario')";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdAlmacenEntrada,$IdDescProdEmpaque, $Lote, $Cantidad, $Placa, $IdUsuario){

            $Sql=" Update AlmacenEntrada set IdDescProdEmpaque='$IdDescProdEmpaque', 
            Lote='$Lote', Cantidad='$Cantidad', Fecha=(select now()), Placa='$Placa', IdUsuario='$IdUsuario' where IdAlmacenEntrada='$IdAlmacenEntrada';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdAlmacenEntrada){

            $Sql=" Update AlmacenEntrada set Estado=0 where IdAlmacenEntrada='$IdAlmacenEntrada';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdAlmacenEntrada){

            $Sql=" Update AlmacenEntrada set Estado=1 where IdAlmacenEntrada='$IdAlmacenEntrada';";
            
            return EjecutarConsulta($Sql);

        }


        public function Aceptar ($IdAlmacenEntrada){

            $Sql=" Update AlmacenEntrada set EstadoL=1 where IdAlmacenEntrada='$IdAlmacenEntrada';";
            
            return EjecutarConsulta($Sql);

        }

        public function Rechazar ($IdAlmacenEntrada){

            $Sql=" Update AlmacenEntrada set EstadoL=0 where IdAlmacenEntrada='$IdAlmacenEntrada';";
            
            return EjecutarConsulta($Sql);

        }


        public function Mostrar($IdAlmacenEntrada){

            $Sql="Select * from AlmacenEntrada 
            where IdAlmacenEntrada='$IdAlmacenEntrada'";
            return EjecutarConsultaSImpleFila($Sql);

        }


        public function ListarDescProdEmpaque (){

            $Sql="select DPE.IdDescProdEmpaque, DP.DescProd, DPE.Presentacion, DPE.Paquete,DPE.Unidad,
            ifnull((select sum(AE.Cantidad) from AlmacenEntrada AE where AE.IdDescProdEmpaque=DPE.IdDescProdEmpaque and AE.Estado=1),0) as Ingreso,
            ifnull((select sum(SA.Cantidad) from SalidaAlmacen SA inner join AlmacenEntrada AE on AE.IdAlmacenEntrada=SA.IdAlmacenEntrada 
            where AE.IdDescProdEmpaque=DPE.IdDescProdEmpaque and SA.Estado=1 ),0) as Salida,
            DPE.Estado from DescProdEmpaque DPE inner join DescProd DP
            on DP.IdDescProd=DPE.IdDescProd order by IdDescProdEmpaque desc ";
            
            return EjecutarConsulta($Sql);

        }



        public function ListarAlmacenEntrada ($IdDescProdEmpaque){

            $Sql="select AE.IdAlmacenEntrada, DP.DescProd, DPE.Presentacion, AE.Lote, AE.Cantidad, AE.Fecha, AE.Placa,  
            ifnull((select sum(SA.Cantidad) from SalidaAlmacen SA 
            where SA.IdAlmacenEntrada=AE.IdAlmacenEntrada and SA.Estado=1 ),0) as Salida,
            
            U.Usuario,AE.EstadoL, AE.Estado  from AlmacenEntrada AE
                        inner join DescProdEmpaque DPE on DPE.IdDescProdEmpaque=AE.IdDescProdEmpaque
                        inner join DescProd DP on DP.IdDescProd=DPE.IdDescProd
                        inner join Usuario U on U.IdUsuario=AE.IdUsuario where AE.IdDescProdEmpaque='$IdDescProdEmpaque'; ";
            
            return EjecutarConsulta($Sql);

        }

}




?>