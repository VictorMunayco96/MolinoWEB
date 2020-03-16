<?php
ob_start();
session_start();
require_once "../Modelos/MPanel.php";

$MPanel= new MPanel();

$IdPedido=isset($_POST["IdPedido"]) ? limpiarCadena($_POST["IdPedido"]):"" ;
$IdCabeceraPedido=isset($_POST["IdCabeceraPedido"]) ? limpiarCadena($_POST["IdCabeceraPedido"]):"";
$CantidadBatch=isset($_POST["CantidadBatch"]) ? limpiarCadena($_POST["CantidadBatch"]):"";
$Observacion=isset($_POST["Observacion"]) ? limpiarCadena($_POST["Observacion"]):"";
$CantidadKG=isset($_POST["CantidadKG"]) ? limpiarCadena($_POST["CantidadKG"]):"";
$IdUsuario=$_SESSION['IdUsuario'];
$IdDescProd=isset($_POST["IdDescProd"]) ? limpiarCadena($_POST["IdDescProd"]):"";
$NumSemana=$_SESSION['NumSemana'];



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdPedido)){

  
$Rspta=$MPedido->Insertar($IdCabeceraPedido, $CantidadBatch, $Observacion, $CantidadKG, $IdUsuario, $IdDescProd, $NumSemana);

echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MPedido->Editar($IdPedido,$IdCabeceraPedido, $CantidadBatch, $Observacion, $CantidadKG, $IdUsuario, $IdDescProd, $NumSemana);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MPedido->Desactivar($IdPedido);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MPedido->Activar($IdPedido);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Aceptar':

        $Rspta=$MPedido->Aceptar($IdPedido);
        echo $Rspta ? "ACEPTADO" : "NO SE PUDO ACEPTAR";
        
        break;

case 'Rechazar':

            $Rspta=$MPedido->Rechazar($IdPedido);
            echo $Rspta ? "RECHAZADO" : "NO SE PUDO RECHAZAR";
            
            break;

case 'Mostrar':

    $Rspta=$MPedido->Mostrar($IdPedido);
    echo json_encode($Rspta); 

break;


case 'ListarCabeceraPedido':

    $Rspta=$MPanel->ListarCabeceraPedido();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>'<button class="btn btn-success" onclick="ListarPedido('.$Reg->IdCabeceraPedido.')"><i class="fa fa-eye"></i></button>',
       
            
            "1"=>$Reg->DestinoDes,
            "2"=>$Reg->TipoTransporte,
            "3"=>$Reg->OrdenEnvio,
            "4"=>($Reg->Pendiente!=0)?'<span class="label bg-yellow">'.$Reg->Pendiente.'</span>':
            '<span class="label bg-green">Cumplido</span>',

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


case 'ListarPedido':


$NumSemana=$_SESSION['NumSemana'];
$IdCabeceraPedido=$_REQUEST['IdCabeceraPedido'];




    $RsptaP=$MPanel->ListarPedido($IdCabeceraPedido, $NumSemana);
   
    $DataP = Array();

    while($RegP=$RsptaP->fetch_object()){

        $DataP[]=array(

         
            



            "0"=> '<button class="btn btn-success" onclick="Mostrar('.$RegP->IdPedido.')"><i class="fa fa-plus"></i></button>'          ,

            "1"=>$RegP->DestinoDes,
            "2"=>$RegP->DescProd,
            "3"=>$RegP->CantidadBatch,
            "4"=>($RegP->Restante==0)?'<span class="label bg-green">PEDIDO CUMPLIDO</span>':
            '<span class="label bg-orange">'.$RegP->Restante.'</span>',
            "5"=>$RegP->CantidadKG,
            "6"=>$RegP->Observacion,
            "7"=>$RegP->Usuario,
           
            "8"=>($RegP->EstadoP)?'<span class="label bg-green">Activado</span>':
            '<span class="label bg-red">Desactivado</span>'
            
        
        );
    }

    $Result = array(

        "sEcho"=>1,
        "iTotalRecords"=>count($DataP),
        "ITotalDisplayRecords"=>count($DataP),
        "aaData"=>$DataP);

        echo json_encode($Result);




    



break;





case "SelectCabeceraPedido":

    require_once "../Modelos/MCabeceraPedido.php";
    $MCabeceraPedido = new MCabeceraPedido();

    $Rspta=$MCabeceraPedido->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdCabeceraPedido.'>'.$Reg->DestinoDes.' - '.$Reg->TipoTransporte.'</option>';

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