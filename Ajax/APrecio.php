<?php
ob_start();
session_start();
require_once "../Modelos/MPrecio.php";

$MPrecio= new MPrecio();

$IdPrecio=isset($_POST["IdPrecio"]) ? limpiarCadena($_POST["IdPrecio"]):"" ;
$Precio=isset($_POST["Precio"]) ? limpiarCadena($_POST["Precio"]):"";
$NumSemana=$_SESSION["NumSemana"];
$IdDescProd=isset($_POST["IdDescProd"]) ? limpiarCadena($_POST["IdDescProd"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdPrecio)){
$Rspta=$MPrecio->Insertar($IdPrecio, $Precio, $NumSemana, $);
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