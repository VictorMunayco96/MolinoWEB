<?php

require_once "../Modelos/MBalanza1.php";

$MBalanza1= new MBalanza1();


switch ($_GET["Op"]){


case 'SalBalanzaFec':

    $FechaInicio=$_REQUEST["FechaInicio"];
    $FechaFin=$_REQUEST["FechaFin"];
    $Busqueda=$_REQUEST["Busqueda"];
    $Filtro=$_REQUEST["Filtro"];
    

    
    $Rspta=$MBalanza1->SalBalanzaFec($FechaInicio, $FechaFin ,$Busqueda,$Filtro);

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>$Reg->IdPeso,
            "1"=>$Reg->Placa,
            "2"=>$Reg->ClieProve,
            "3"=>$Reg->Producto,
            "4"=>$Reg->Guia,
            "5"=>$Reg->Chofer,
           "6"=>$Reg->Destino,
            "7"=>$Reg->FechaIngreso,
            "8"=>$Reg->FechaSalida,
            "9"=>$Reg->PesoIngreso,
            "10"=>$Reg->PesoSalida,
            "11"=>(($Reg->PesoIngreso-$Reg->PesoSalida)<0)?(($Reg->PesoIngreso-$Reg->PesoSalida)*-1):($Reg->PesoIngreso-$Reg->PesoSalida),
            "12"=>$Reg->ObserSalida
        
        );
    }

    $Result = array(

        "sEcho"=>1,
        "iTotalRecords"=>count($Data),
        "ITotalDisplayRecords"=>count($Data),
        "aaData"=>$Data);

        echo json_encode($Result);


break;



}

?>