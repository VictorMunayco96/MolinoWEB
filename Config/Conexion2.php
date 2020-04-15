<?php 



$Conexion2 = new mysqli('192.168.116.38','Visit','Paco123','bdpesos');

mysqli_query($Conexion2, 'SET NAMES "'."utf8".'"');

if(mysqli_connect_errno()){

    printf("Fallo conexion a la base de datos :%s\n",mysqli_connect_errr());
    exit();
}


if(!function_exists('EjecutarConsulta')){

function EjecutarConsulta($Sql){

    global $Conexion2;
    $Query = $Conexion2->query($Sql);
    return $Query;
}



}

?>