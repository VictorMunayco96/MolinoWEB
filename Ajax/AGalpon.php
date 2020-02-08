<?php

require_once "../Modelos/MGalpon.php";

$MGalpon= new MGalpon();

$IdGalpon=isset($_POST["IdGalpon"]) ? limpiarCadena($_POST["IdGalpon"]):"" ;
$Galpon=isset($_POST["Galpon"]) ? limpiarCadena($_POST["Galpon"]):"";
$CodGalpon=isset($_POST["CodGalpon"]) ? limpiarCadena($_POST["CodGalpon"]):"";
$IdDestinoBloq=isset($_POST["IdDestinoBloq"]) ? limpiarCadena($_POST["IdDestinoBloq"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdGalpon)){
$Rspta=$MGalpon->Insertar($Galpon,$CodGalpon,$IdDestinoBloq);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MGalpon->Editar($IdGalpon,$Galpon,$CodGalpon,$IdDestinoBloq);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MGalpon->Desactivar($IdGalpon);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MGalpon->Activar($IdGalpon);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MGalpon->Mostrar($IdGalpon);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MGalpon->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdGalpon.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdGalpon.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdGalpon.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdGalpon.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->Galpon,
            "2"=>$Reg->CodGalpon,
            "3"=>$Reg->DestinoBloq,
            "4"=>($Reg->Estado)?'<span class="label bg-green">Activado</span>':
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

case "SelectDestinoBloq":

    require_once "../Modelos/MDestinoBloq.php";
    $MDestinoBloq = new MDestinoBloq();

    $Rspta=$MDestinoBloq->Select();

    while($Reg = $Rspta->fetch_object()){


        echo '<option value=' .$Reg->IdDestinoBloq.'>'.$Reg->DestinoBloq.'</option>';


    }


break;

}

?>