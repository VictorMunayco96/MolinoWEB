<?php

require_once "../Modelos/MDestinoBloq.php";

$MDestinoBloq= new MDestinoBloq();

$IdDestinoBloq=isset($_POST["IdDestinoBloq"]) ? limpiarCadena($_POST["IdDestinoBloq"]):"" ;
$DestinoBloq=isset($_POST["DestinoBloq"]) ? limpiarCadena($_POST["DestinoBloq"]):"";
$CodDestinoBloq=isset($_POST["CodDestinoBloq"]) ? limpiarCadena($_POST["CodDestinoBloq"]):"";
$IdDestinoDesc=isset($_POST["IdDestinoDesc"]) ? limpiarCadena($_POST["IdDestinoDesc"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdDestinoBloq)){
$Rspta=$MDestinoBloq->Insertar($DestinoBloq,$CodDestinoBloq,$IdDestinoDesc);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MDestinoBloq->Editar($IdDestinoBloq,$DestinoBloq,$CodDestinoBloq,$IdDestinoDesc);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MDestinoBloq->Desactivar($IdDestinoBloq);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MDestinoBloq->Activar($IdDestinoBloq);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MDestinoBloq->Mostrar($IdDestinoBloq);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MDestinoBloq->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdDestinoBloq.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdDestinoBloq.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdDestinoBloq.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdDestinoBloq.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->DestinoBloq,
            "2"=>$Reg->CodDestinoBloq,
            "3"=>$Reg->DestinoDes,
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

case "SelectDestinoDesc":

    require_once "../Modelos/MDestinoDesc.php";
    $MDestinoDesc = new MDestinoDesc();

    $Rspta=$MDestinoDesc->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdDestinoDesc.'>'.$Reg->DestinoDes.'</option>';

    }


break;

}

?>