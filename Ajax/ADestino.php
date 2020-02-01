<?php

require_once "../Modelos/MDestino.php";

$MDestino= new MDestino();

$IdDestino=isset($_POST["IdDestino"]) ? limpiarCadena($_POST["IdDestino"]):"" ;
$Destino=isset($_POST["Destino"]) ? limpiarCadena($_POST["Destino"]):"";
$CodDestino=isset($_POST["CodDestino"]) ? limpiarCadena($_POST["CodDestino"]):"";
$IdTipoDestino=isset($_POST["IdTipoDestino"]) ? limpiarCadena($_POST["IdTipoDestino"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdDestino)){
$Rspta=$MDestino->Insertar($Destino,$CodDestino,$IdTipoDestino);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MDestino->Editar($IdDestino,$Destino,$CodDestino,$IdTipoDestino);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MDestino->Desactivar($IdDestino);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MDestino->Activar($IdDestino);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MDestino->Mostrar($IdDestino);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MDestino->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdDestino.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdDestino.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdDestino.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdDestino.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->Destino,
            "2"=>$Reg->CodDestino,
            "3"=>$Reg->TipoDestino,
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

case "SelectTipoDestino":

    require_once "../Modelos/MTipoDestino.php";
    $MTipoDestino = new MTipoDestino();

    $Rspta=$MTipoDestino->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdTipoDestino.'>'.$Reg->TipoDestino.'</option>';

    }


break;

}

?>