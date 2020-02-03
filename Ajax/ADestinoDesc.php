<?php

require_once "../Modelos/MDestinoDesc.php";

$MDestinoDesc= new MDestinoDesc();

$IdDestinoDesc=isset($_POST["IdDestinoDesc"]) ? limpiarCadena($_POST["IdDestinoDesc"]):"" ;
$DestinoDes=isset($_POST["DestinoDes"]) ? limpiarCadena($_POST["DestinoDes"]):"";
$CodDestinoDesc=isset($_POST["CodDestinoDesc"]) ? limpiarCadena($_POST["CodDestinoDesc"]):"";
$IdDestino=isset($_POST["IdDestino"]) ? limpiarCadena($_POST["IdDestino"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdDestinoDesc)){
$Rspta=$MDestinoDesc->Insertar($DestinoDes,$CodDestinoDesc,$IdDestino);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MDestinoDesc->Editar($IdDestinoDesc,$DestinoDes,$CodDestinoDesc,$IdDestino);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MDestinoDesc->Desactivar($IdDestinoDesc);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MDestinoDesc->Activar($IdDestinoDesc);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MDestinoDesc->Mostrar($IdDestinoDesc);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MDestinoDesc->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdDestinoDesc.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdDestinoDesc.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdDestinoDesc.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdDestinoDesc.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->DestinoDes,
            "2"=>$Reg->CodDestinoDesc,
            "3"=>$Reg->Destino,
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

case "SelectDestino":

    require_once "../Modelos/MDestino.php";
    $MDestino = new MDestino();

    $Rspta=$MDestino->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdDestino.'>'.$Reg->Destino.'</option>';

    }


break;

}

?>