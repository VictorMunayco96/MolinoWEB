<?php

ob_start();
session_start();


require_once "../Modelos/MBalanzaReg.php";

$MBalanzaReg= new MBalanzaReg();

$NumGuia=isset($_POST["NumGuia"]) ? limpiarCadena($_POST["NumGuia"]):"" ;  
$PesoCE=isset($_POST["PesoCE"]) ? limpiarCadena($_POST["PesoCE"]):"" ;
$PesoCS=isset($_POST["PesoCS"]) ? limpiarCadena($_POST["PesoCS"]):"" ; 
$NetoCS=isset($_POST["NetoCS"]) ? limpiarCadena($_POST["NetoCS"]):"" ; 
$ObservS=isset($_POST["IdVariaciones"]) ? limpiarCadena($_POST["ObservS"]):"" ;
$IdProveClien=isset($_POST["IdProveClien"]) ? limpiarCadena($_POST["IdProveClien"]):"" ; 
$IdConductorVehiculo=isset($_POST["IdConductorVehiculo"]) ? limpiarCadena($_POST["IdConductorVehiculo"]):"" ; 
$IdDestinoBloq=isset($_POST["IdDestinoBloq"]) ? limpiarCadena($_POST["IdDestinoBloq"]):"" ;
$IdDescProd=isset($_POST["IdDescProd"]) ? limpiarCadena($_POST["IdDescProd"]):"" ;
$NumSemana=$_SESSION['NumSemana'];
$IdUsuario=$_SESSION['IdUsuario'];


switch ($_GET["Op"]){

case 'GuardaryEditar':

$Rspta=$MBalanzaReg->Insertar($NumGuia,  $PesoCE,$PesoCS, $NetoCS, $ObservS, $IdUsuario, $IdProveClien, $IdConductorVehiculo, $IdDestinoBloq,$IdDescProd,$NumSemana);


echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";


break;


case "SelectProveClien":

    require_once "../Modelos/MProveClien.php";
    $MProveClien= new MProveClien();

    $Rspta=$MProveClien->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdProveClien.'>'.$Reg->RazonSocial.'</option>';

    }


break;


case "SelectConductorVehiculo":

    require_once "../Modelos/MConductorVehiculo.php";
    $MConductorVehiculo = new MConductorVehiculo();

    $Rspta=$MConductorVehiculo->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdConductorVehiculo.'>'.$Reg->Placa.'-'.$Reg->Nombre.' '.$Reg->Apellidos .'</option>';

    }


break;


case "SelectDestinoBloq":

    require_once "../Modelos/MDestinoBloq.php";
    $MDestinoBloq = new MDestinoBloq();

    $Rspta=$MDestinoBloq->SelectDescProdBal();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdDestinoBloq.'>'.$Reg->Destino.'/ '.$Reg->DestinoDes.'/ '.$Reg->DestinoBloq.'</option>';

    }


break;



case "SelectDescProd":

    require_once "../Modelos/MDescProd.php";
    $MDescProd = new MDescProd();

    $Rspta=$MDescProd->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdDescProd.'>'.$Reg->DescProd.'</option>';

    }


break;


}

?>