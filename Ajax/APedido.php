<?php
ob_start();
session_start();
require_once "../Modelos/MPedido.php";

$MPedido= new MPedido();

$IdProducto=isset($_POST["IdProducto"]) ? limpiarCadena($_POST["IdProducto"]):"" ;
$Producto=isset($_POST["Producto"]) ? limpiarCadena($_POST["Producto"]):"";
$CodProducto=isset($_POST["CodProducto"]) ? limpiarCadena($_POST["CodProducto"]):"";
$IdCategoriaProd=isset($_POST["IdCategoriaProd"]) ? limpiarCadena($_POST["IdCategoriaProd"]):"";
$NombreGuia=isset($_POST["NombreGuia"]) ? limpiarCadena($_POST["NombreGuia"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdProducto)){
$Rspta=$MProducto->Insertar($Producto,$CodProducto,$IdCategoriaProd,$NombreGuia);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MProducto->Editar($IdProducto,$Producto,$CodProducto,$IdCategoriaProd,$NombreGuia);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MProducto->Desactivar($IdProducto);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MProducto->Activar($IdProducto);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MProducto->Mostrar($IdProducto);
    echo json_encode($Rspta); 

break;


case 'ListarCabeceraPedido':

    $Rspta=$MPedido->ListarCabeceraPedido();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>'<button class="btn btn-info" onclick="ListarPedido('.$Reg->IdCabeceraPedido.')"><i class="fa fa-eye"></i></button>',
       
            
            "1"=>$Reg->DestinoDes,
            "2"=>$Reg->TipoTransporte,
            "3"=>$Reg->OrdenEnvio,
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


case 'ListarPedido':


$NumSemana=$_SESSION['NumSemana'];
$IdCabeceraPedido=$_REQUEST['IdCabeceraPedido'];



    $RsptaP=$MPedido->ListarPedido($IdCabeceraPedido, $NumSemana);
   
    $DataP = Array();

    while($RegP=$RsptaP->fetch_object()){

        $DataP[]=array(

            "0"=>$RegP->IdPedido,
       
            
            "1"=>$RegP->IdCabeceraPedido,
            "2"=>$RegP->CantidadBatch,
            "3"=>$RegP->Observacion,
            "4"=>$RegP->PEstado
        
        );
    }

    $Result = array(

        "sEcho"=>1,
        "iTotalRecords"=>count($DataP),
        "ITotalDisplayRecords"=>count($DataP),
        "aaData"=>$DataP);

        echo json_encode($Result);



break;





case "SelectCategoriaProd":

    require_once "../Modelos/MCategoriaProd.php";
    $MCategoriaProd = new MCategoriaProd();

    $Rspta=$MCategoriaProd->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdCategoriaProd.'>'.$Reg->CategoriaProd.'</option>';

    }


break;

}

?>