<?php

require_once "../Modelos/MTipoDestino.php";

$MTipoDestino= new MTipoDestino();

$IdTipoDestino=isset($_POST["IdTipoDestino"]) ? limpiarCadena($_POST["IdTipoDestino"]):"" ;
$TipoDestino=isset($_POST["TipoDestino"]) ? limpiarCadena($_POST["TipoDestino"]):"";
$CodDestino=isset($_POST["CodDestino"]) ? limpiarCadena($_POST["CodDestino"]):"";

switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdTipoDestino)){
$Rspta=$MTipoDestino->Insertar($TipoDestino,$CodDestino);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MTipoProducto->Editar($IdTipoDestino,$TipoDestino,$CodDestino);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MTipoDestino->Desactivar($IdTipoDestino);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MTipoDestino->Activar($IdTipoDestino);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MTipoDestino->Mostrar($IdTipoDestino);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MTipoDestino->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdTipoDestino.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdTipoDestino.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdTipoDestino.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdTipoDestino.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->TipoDestino,
            "2"=>$Reg->CodDestino,
            "3"=>($Reg->Estado)?'<span class="label bg-green">Activado</span>':
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



}

?>