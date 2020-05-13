<?php
ob_start();
session_start();
require_once "../Modelos/MConsultas.php";

$MConsultas= new MConsultas();


switch ($_GET["Op"]){


case 'SalBalanzaFec':

    $FechaInicio=$_REQUEST["FechaInicio"];
    $FechaFin=$_REQUEST["FechaFin"];
    $Busqueda=$_REQUEST["Busqueda"];
    $Filtro=$_REQUEST["Filtro"];
    

    
    $Rspta=$MConsultas->SalBalanzaFec($FechaInicio, $FechaFin ,$Busqueda,$Filtro);

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>$Reg->IdPeso,
            "1"=>$Reg->Placa,
            "2"=>$Reg->RazonSocial,
            "3"=>$Reg->DescProd,
            "4"=>$Reg->NumGuia,
            "5"=>$Reg->Nombre.' '.$Reg->Apellidos,
           "6"=>$Reg->DestinoDes.' '.$Reg->DestinoBloq,
            "7"=>$Reg->FechaHoraEnt,
            "8"=>$Reg->FechaHoraSal,
            "9"=>$Reg->PesoCE,
            "10"=>$Reg->PesoCS,
            "11"=>$Reg->NetoC,
            "12"=>$Reg->ObservE,
        
            "13"=>$Reg->ObservS
        
        );
    }

    $Result = array(

        "sEcho"=>1,
        "iTotalRecords"=>count($Data),
        "ITotalDisplayRecords"=>count($Data),
        "aaData"=>$Data);

        echo json_encode($Result);


break;


case 'DiferenciaPesos':

    $NumSemana=$_REQUEST["NumSemana"];

    

    
    $Rspta=$MConsultas->DiferenciaPesos($NumSemana);

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>$Reg->Producto,
            "1"=>$Reg->PesoP,
            "2"=>$Reg->PesoB,
            "3"=>($Reg->PesoP-$Reg->PesoB),
            "4"=>$Reg->Costo
         
        
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