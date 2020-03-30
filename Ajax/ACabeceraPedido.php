<?php

require_once "../Modelos/MCabeceraPedido.php";

$MCabeceraPedido= new MCabeceraPedido();

$IdCabeceraPedido=isset($_POST["IdCabeceraPedido"]) ? limpiarCadena($_POST["IdCabeceraPedido"]):"" ;
$IdDestinoDesc=isset($_POST["IdDestinoDesc"]) ? limpiarCadena($_POST["IdDestinoDesc"]):"";
$OrdenEnvio=isset($_POST["OrdenEnvio"]) ? limpiarCadena($_POST["OrdenEnvio"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdCabeceraPedido)){
$Rspta=$MCabeceraPedido->Insertar($IdDestinoDesc, $OrdenEnvio);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MCabeceraPedido->Editar($IdCabeceraPedido, $IdDestinoDesc, $OrdenEnvio);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MCabeceraPedido->Desactivar($IdCabeceraPedido);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MCabeceraPedido->Activar($IdCabeceraPedido);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MCabeceraPedido->Mostrar($IdCabeceraPedido);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MCabeceraPedido->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdCabeceraPedido.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdCabeceraPedido.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdCabeceraPedido.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdCabeceraPedido.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->DestinoDes,
            
            "2"=>$Reg->OrdenEnvio,
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