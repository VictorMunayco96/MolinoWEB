<?php

require_once "../Modelos/MConsultas.php";

$MConsultas= new MConsultas();


switch ($_GET["Op"]){


case 'SalBalanzaFec':

    $FechaInicio=$_REQUEST["FechaInicio"];
    $FechaFin=$_REQUEST["FechaFin"];

    
    $Rspta=$MConsultas->SalBalanzaFec($FechaInicio, $FechaFin);

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>$Reg->IdPeso,
            "1"=>$Reg->Placa,
            "2"=>$Reg->RazonSocial,
            "3"=>$Reg->DescProd,
            "4"=>$Reg->NumGuia,
            "5"=>$Reg->NombreChofer,
            "6"=>$Reg->DestinoF,
            "7"=>$Reg->FechaHoraEnt,
            "8"=>$Reg->FechaHoraSal,
            "9"=>$Reg->PesoCE,
            "10"=>$Reg->PesoCS,
            "11"=>$Reg->NetoC,
            "12"=>$Reg->ObservS
        
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