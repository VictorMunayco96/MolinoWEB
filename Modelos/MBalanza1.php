<?php

require "../Config/Conexion2.php";

    Class MBalanza1{

        public function __construct(){



        }

       

     

        public function SalBalanzaFec($FechaInicio, $FechaFin, $Busqueda, $Filtro){

           
           if($Filtro=="PRODUCTO"){

            $Sql="SELECT Cod_Peso AS IdPeso, Num_Placa as Placa, Des_Producto as Producto, Num_Guia as Guia, Des_ClienteProveedor as ClieProve, Ds_Chofer as Chofer, Ds_Destino as Destino, FechaIngreso, FechaSalida, PesoIngreso, PesoSalida, ObserIngreso, ObserSalida from pesos 
            where Des_Producto like concat('%','$Busqueda','%') AND FechaSalida>='$FechaInicio' and FechaSalida<='$FechaFin' 
            order by Cod_Peso asc limit 4000;";



           }
           
           if($Filtro=="DESTINO"){

            $Sql="SELECT Cod_Peso AS IdPeso, Num_Placa as Placa, Des_Producto as Producto, Num_Guia as Guia, Des_ClienteProveedor as ClieProve, Ds_Chofer as Chofer, Ds_Destino as Destino, FechaIngreso, FechaSalida, PesoIngreso, PesoSalida, ObserIngreso, ObserSalida from pesos 
            where Ds_Destino like concat('%','$Busqueda','%') AND FechaSalida>='$FechaInicio' and FechaSalida<='$FechaFin' 
            order by Cod_Peso asc limit 4000;";




           }

           if($Filtro=="PROVEEDOR"){

            $Sql="SELECT Cod_Peso AS IdPeso, Num_Placa as Placa, Des_Producto as Producto, Num_Guia as Guia, Des_ClienteProveedor as ClieProve, Ds_Chofer as Chofer, Ds_Destino as Destino, FechaIngreso, FechaSalida, PesoIngreso, PesoSalida, ObserIngreso, ObserSalida from pesos 
            where Des_ClienteProveedor like concat('%','$Busqueda','%') AND FechaSalida>='$FechaInicio' and FechaSalida<='$FechaFin' 
            order by Cod_Peso asc limit 4000;";




           }

           if($Filtro=="CHOFER"){

            $Sql="SELECT Cod_Peso AS IdPeso, Num_Placa as Placa, Des_Producto as Producto, Num_Guia as Guia, Des_ClienteProveedor as ClieProve, Ds_Chofer as Chofer, Ds_Destino as Destino, FechaIngreso, FechaSalida, PesoIngreso, PesoSalida, ObserIngreso, ObserSalida from pesos 
            where Ds_Chofer like concat('%','$Busqueda','%') AND FechaSalida>='$FechaInicio' and FechaSalida<='$FechaFin' 
            order by Cod_Peso asc limit 4000;";




           }

           
         
            
            return EjecutarConsulta($Sql);

        }



        


       




    


}




?>