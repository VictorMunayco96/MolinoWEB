<?php
ob_start();
session_start();
require_once "../Modelos/MPedidoSemanal.php";

$MPedidoSemanal= new MPedidoSemanal();

$IdPedidoSemanal=isset($_POST["IdPedidoSemanal"]) ? limpiarCadena($_POST["IdPedidoSemanal"]):"" ;
$IdCabeceraPedido=isset($_POST["IdCabeceraPedido"]) ? limpiarCadena($_POST["IdCabeceraPedido"]):"";
$IdDescProd=isset($_POST["IdDescProd"]) ? limpiarCadena($_POST["IdDescProd"]):"";
$CantidadBatch=isset($_POST["CantidadBatch"]) ? limpiarCadena($_POST["CantidadBatch"]):"";
$CantidadKG=isset($_POST["CantidadKG"]) ? limpiarCadena($_POST["CantidadKG"]):"";
$NumSemana=$_SESSION['NumSemana'];
$Observacion=isset($_POST["Observacion"]) ? limpiarCadena($_POST["Observacion"]):"";
$IdUsuario=$_SESSION['IdUsuario'];
$IdDestinoBloq=isset($_POST["IdDestinoBloq"]) ? limpiarCadena($_POST["IdDestinoBloq"]):"";


switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdPedidoSemanal)){

  
$Rspta=$MPedidoSemanal->Insertar($IdCabeceraPedido, $IdDescProd, $CantidadBatch, $CantidadKG, $NumSemana, $Observacion, $IdUsuario,$IdDestinoBloq);

echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MPedidoSemanal->Editar($IdPedidoSemanal,$IdCabeceraPedido, $IdDescProd, $CantidadBatch, $CantidadKG, $NumSemana, $Observacion, $IdUsuario);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MPedidoSemanal->Desactivar($IdPedidoSemanal);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MPedidoSemanal->Activar($IdPedidoSemanal);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Aceptar':

        $Rspta=$MPedidoSemanal->Aceptar($IdPedidoSemanal);
        echo $Rspta ? "ACEPTADO" : "NO SE PUDO ACEPTAR";
        
        break;

case 'Rechazar':

            $Rspta=$MPedidoSemanal->Rechazar($IdPedidoSemanal);
            echo $Rspta ? "RECHAZADO" : "NO SE PUDO RECHAZAR";
            
            break;

case 'Mostrar':

    $Rspta=$MPedidoSemanal->Mostrar($IdPedidoSemanal);
    echo json_encode($Rspta); 

break;


case 'ListarCabeceraPedido':

    $Rspta=$MPedidoSemanal->ListarCabeceraPedido($_SESSION['NumSemana']);

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>'<button class="btn btn-success" onclick="AgregarPedidoSemanal('.$Reg->IdCabeceraPedido.')"><i class="fa fa-plus"></i></button>
            <button class="btn btn-warning" onclick="ListarPedidoSemanal('.$Reg->IdCabeceraPedido.')"><i class="fa fa-eye"></i></button>',
       
            
            "1"=>$Reg->DestinoDes,
            "2"=>$Reg->OrdenEnvio,
            "3"=>$Reg->TotalMezclas,
            "4"=>$Reg->CantidadVA,
            "5"=>$Reg->TotalFinal,
            "6"=>($Reg->Pendiente>0)?'<span class="label bg-yellow">Pendiente</span>':
            '<span class="label bg-green">Al Dia</span>',

            "7"=>($Reg->Estado)?'<span class="label bg-green">Activado</span>':
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


case 'ListarPedidoSemanal':


$NumSemana=$_SESSION['NumSemana'];
$IdCabeceraPedido=$_REQUEST['IdCabeceraPedido'];


if($_SESSION['TipoUsuario']=="DIGITADOR"){

    $RsptaP=$MPedidoSemanal->ListarPedidoSemanal($IdCabeceraPedido, $NumSemana);
   
    $DataP = Array();

    while($RegP=$RsptaP->fetch_object()){

        $DataP[]=array(

         
            



            "0"=>($RegP->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$RegP->IdPedidoSemanal.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$RegP->IdPedidoSemanal.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$RegP->IdPedidoSemanal.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$RegP->IdPedidoSemanal.')"><i class="fa fa-check"></i></button>',

            "1"=>$RegP->DestinoDes,
            "2"=>$RegP->DestinoBloq,
            "3"=>$RegP->DescProd,
            "4"=>$RegP->CantidadBatch,
            "5"=>$RegP->CantidadVA,
            "6"=>$RegP->TotalFinal,
          
            "7"=>$RegP->Observacion,
            "8"=>$RegP->Fecha,
            "9"=>$RegP->Usuario,
            "10"=>($RegP->EstadoPS)?'<span class="label bg-green">Aceptado</span>':
            '<span class="label bg-orange">Pendiente</span>',
            "11"=>($RegP->Estado)?'<span class="label bg-green">Activado</span>':
            '<span class="label bg-red">Desactivado</span>'
            
        
        );
    }

    $Result = array(

        "sEcho"=>1,
        "iTotalRecords"=>count($DataP),
        "ITotalDisplayRecords"=>count($DataP),
        "aaData"=>$DataP);

        echo json_encode($Result);



}else{


    $RsptaP=$MPedidoSemanal->ListarPedidoSemanal($IdCabeceraPedido, $NumSemana);
   
    $DataP = Array();

    while($RegP=$RsptaP->fetch_object()){

        $DataP[]=array(

         
            



            "0"=>($RegP->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$RegP->IdPedidoSemanal.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$RegP->IdPedidoSemanal.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$RegP->IdPedidoSemanal.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$RegP->IdPedidoSemanal.')"><i class="fa fa-check"></i></button>',

            "1"=>($RegP->EstadoPS)?' <button class="btn btn-warning" onclick="Rechazar('.$RegP->IdPedidoSemanal.')"><i class="fa fa-close"></i></button>':
            ' <button class="btn btn-success" onclick="Aceptar('.$RegP->IdPedidoSemanal.')"><i class="fa fa-check"></i></button>',
            "2"=>$RegP->DestinoDes,
            "3"=>$RegP->DestinoBloq,
            "4"=>$RegP->DescProd,
           
            "5"=>$RegP->CantidadBatch,
            "6"=>$RegP->CantidadVA,
            "7"=>$RegP->TotalFinal,
            
            "8"=>$RegP->Observacion,
            "9"=>$RegP->Fecha,
            "10"=>$RegP->Usuario,
            
            "11"=>($RegP->EstadoPS)?'<span class="label bg-green">Aceptado</span>':
            '<span class="label bg-orange">Pendiente</span>',
            "12"=>($RegP->Estado)?'<span class="label bg-green">Activado</span>':
            '<span class="label bg-red">Desactivado</span>'
            
            
        
        );
    }

    $Result = array(

        "sEcho"=>1,
        "iTotalRecords"=>count($DataP),
        "ITotalDisplayRecords"=>count($DataP),
        "aaData"=>$DataP);

        echo json_encode($Result);




}
    



break;





case "SelectCabeceraPedido":

    require_once "../Modelos/MCabeceraPedido.php";
    $MCabeceraPedido = new MCabeceraPedido();

    $Rspta=$MCabeceraPedido->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value='.$Reg->IdCabeceraPedido.'>'.$Reg->DestinoDes.'</option>';

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

case "SelectBloqDesc":

$IdCabeceraPedido=$_REQUEST['IdCabeceraPedido'];
echo $IdCabeceraPedido;
    require_once "../Modelos/MDestinoBloq.php";
    $MDestinoBloq = new MDestinoBloq();

    $Rspta=$MDestinoBloq->SelectBloqDesc($IdCabeceraPedido);

    while($Reg = $Rspta->fetch_object()){

        echo '<option value='.$Reg->IdDestinoBloq.'>'.$Reg->DestinoDes."-".$Reg->DestinoBloq.'</option>';

    }


break;



}

?>