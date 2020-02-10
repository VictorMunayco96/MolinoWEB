<?php

require_once "../Modelos/MConductorVehiculo.php";

$MConductorVehiculo= new MConductorVehiculo();

$IdConductorVehiculo=isset($_POST["IdConductorVehiculo"]) ? limpiarCadena($_POST["IdConductorVehiculo"]):"" ;
$IdPlaca=isset($_POST["IdPlaca"]) ? limpiarCadena($_POST["IdPlaca"]):"";
$IdConductor=isset($_POST["IdConductor"]) ? limpiarCadena($_POST["IdConductor"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdConductorVehiculo)){
$Rspta=$MConductorVehiculo->Insertar($IdPlaca, $IdConductor);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MConductorVehiculo->Editar($IdConductorVehiculo,$IdPlaca, $IdConductor);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MConductorVehiculo->Desactivar($IdConductorVehiculo);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MConductorVehiculo->Activar($IdConductorVehiculo);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MConductorVehiculo->Mostrar($IdConductorVehiculo);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MConductorVehiculo->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdConductorVehiculo.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdConductorVehiculo.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdConductorVehiculo.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdConductorVehiculo.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->Fecha,
            "2"=>$Reg->Placa,
            "3"=>$Reg->Razon_Social,
            "4"=>$Reg->Nombre." ".$Reg->Apellidos,
            "5"=>($Reg->Estado)?'<span class="label bg-green">Activado</span>':
            '<span class="label bg-red">Desactivado</span>'
        
        );
    }

    $Result = array(

        "sEcho"=>1,
        "iTotalRecords"=>count($Data),
        "ITotalDisplayRecords"=>count($Data),
        "aaData"=>$Data);

        echo json_encode($Result);


break;

case "SelectConductor":

    require_once "../Modelos/MConductor.php";
    $MConductor = new MConductor();

    $Rspta=$MConductor->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value='.$Reg->IdConductor.'>'.$Reg->Nombre." ".$Reg->Apellidos.'</option>';

    }


break;

case "SelectVehiculo":

    require_once "../Modelos/MVehiculo.php";
    $MVehiculo = new MVehiculo();

    $Rspta=$MVehiculo->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value='.$Reg->IdPlaca.'>'.$Reg->Placa.'</option>';

    }


break;




}

?>