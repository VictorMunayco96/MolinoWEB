<?php
ob_start();
session_start();
require_once "../Modelos/MVariaciones.php";

$MVariaciones= new MVariaciones();

$IdVariaciones=isset($_POST["IdVariaciones"]) ? limpiarCadena($_POST["IdVariaciones"]):"" ;
$IdPedidoSemanal=isset($_POST["IdPedidoSemanal"]) ? limpiarCadena($_POST["IdPedidoSemanal"]):"";
$CantidadBatch=isset($_POST["CantidadBatch"]) ? limpiarCadena($_POST["CantidadBatch"]):"";
$Motivo=isset($_POST["Motivo"]) ? limpiarCadena($_POST["Motivo"]):"";
$Detalle=isset($_POST["Detalle"]) ? limpiarCadena($_POST["Detalle"]):"";
$IdUsuario=$_SESSION['IdUsuario'];



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdVariaciones)){

  echo "<javascript>alert '".$IdPedidoSemanal."'</javascript>";
$Rspta=$MVariaciones->Insertar($IdPedidoSemanal, $CantidadBatch,$Motivo, $Detalle, $IdUsuario);

echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{
    echo "<javascript>alert '".$IdPedidoSemanal."'</javascript>";
    $Rspta=$MVariaciones->Editar($IdVariaciones,$IdPedidoSemanal, $CantidadBatch,$Motivo, $Detalle, $IdUsuario);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MVariaciones->Desactivar($IdVariaciones);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MVariaciones->Activar($IdVariaciones);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Aceptar':

        $Rspta=$MVariaciones->Aceptar($IdVariaciones);
        echo $Rspta ? "ACEPTADO" : "NO SE PUDO ACEPTAR";
        
        break;

case 'Rechazar':

            $Rspta=$MVariaciones->Rechazar($IdVariaciones);
            echo $Rspta ? "RECHAZADO" : "NO SE PUDO RECHAZAR";
            
            break;

case 'Mostrar':

    $Rspta=$MVariaciones->Mostrar($IdVariaciones);
    echo json_encode($Rspta); 

break;


case 'ListarCabeceraPedido':

    $Rspta=$MVariaciones->ListarCabeceraPedido($_SESSION['NumSemana']);

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>'<button class="btn btn-warning" onclick="ListarPedidoSemanal('.$Reg->IdCabeceraPedido.')"><i class="fa fa-eye"></i></button>',
       
            
            "1"=>$Reg->DestinoDes,
            "2"=>$Reg->OrdenEnvio,
            "3"=>$Reg->TotalMezclas,
            "4"=>($Reg->Pendiente>0)?'<span class="label bg-yellow">Pendiente</span>':
            '<span class="label bg-green">Al Dia</span>',

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


case 'ListarPedidoSemanal':


$NumSemana=$_SESSION['NumSemana'];
$IdCabeceraPedido=$_REQUEST['IdCabeceraPedido'];




    $RsptaP=$MVariaciones->ListarPedidoSemanal($IdCabeceraPedido, $NumSemana);
   
    $DataP = Array();

    while($RegP=$RsptaP->fetch_object()){

        $DataP[]=array(

         
            



            "0"=>'<button class="btn btn-success" onclick="AgregarVariacion('.$RegP->IdPedidoSemanal.')"><i class="fa fa-plus"></i></button>'.
            ' <button class="btn btn-warning" onclick="ListarVariaciones('.$RegP->IdPedidoSemanal.')"><i class="fa fa-eye"></i></button>',

            "1"=>$RegP->DestinoDes,
            "2"=>$RegP->DestinoBloq,
            "3"=>$RegP->DescProd,
            "4"=>$RegP->CantidadBatch,
            "5"=>$RegP->CantidadKG,
          
            "6"=>$RegP->Observacion,
            "7"=>$RegP->Fecha,
            "8"=>$RegP->Usuario,
            "9"=>($RegP->EstadoPS)?'<span class="label bg-green">Aceptado</span>':
            '<span class="label bg-orange">Pendiente</span>',
            "10"=>($RegP->Estado)?'<span class="label bg-green">Activado</span>':
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



case 'ListarPedidoSemanal':


    $NumSemana=$_SESSION['NumSemana'];
    $IdCabeceraPedido=$_REQUEST['IdCabeceraPedido'];
    
    
    
    
        $RsptaP=$MVariaciones->ListarPedidoSemanal($IdCabeceraPedido, $NumSemana);
       
        $DataP = Array();
    
        while($RegP=$RsptaP->fetch_object()){
    
            $DataP[]=array(
    
             
                
    
    
    
                "0"=>'<button class="btn btn-success" onclick="AgregarVariacion('.$RegP->IdPedidoSemanal.')"><i class="fa fa-plus"></i></button>'.
                ' <button class="btn btn-warning" onclick="ListarVariaciones('.$RegP->IdPedidoSemanal.')"><i class="fa fa-eye"></i></button>',
    
                "1"=>$RegP->DestinoDes,
                "2"=>$RegP->DestinoBloq,
                "3"=>$RegP->DescProd,
                "4"=>$RegP->CantidadBatch,
                "5"=>$RegP->CantidadKG,
              
                "6"=>$RegP->Observacion,
                "7"=>$RegP->Fecha,
                "8"=>$RegP->Usuario,
                "9"=>($RegP->EstadoPS)?'<span class="label bg-green">Aceptado</span>':
                '<span class="label bg-orange">Pendiente</span>',
                "10"=>($RegP->Estado)?'<span class="label bg-green">Activado</span>':
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



    case 'ListarVariaciones':


 
        $IdPedidoSemanal=$_REQUEST['IdPedidoSemanal'];
        
        
        if($_SESSION['TipoUsuario']=="DIGITADOR"){

            $RsptaVA=$MVariaciones->ListarVariaciones($IdPedidoSemanal);
           
            $DataVA = Array();
        
            while($RegVA=$RsptaVA->fetch_object()){
        
                $DataVA[]=array(
        
                 
                    
        
        
        
                    "0"=>($RegVA->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$RegVA->IdVariaciones.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="Desactivar('.$RegVA->IdVariaciones.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="Mostrar('.$RegVA->IdVariaciones.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-success" onclick="Activar('.$RegVA->IdVariaciones.')"><i class="fa fa-check"></i></button>',
        
                    "1"=>$RegVA->CantidadBatch,
                    "2"=>$RegVA->Motivo,
                    "3"=>$RegVA->Detalle,
                    "4"=>$RegVA->Usuario,
                    "5"=>$RegVA->Fecha,
                   
                    "6"=>($RegVA->EstadoVA)?'<span class="label bg-green">Aceptado</span>':
                    '<span class="label bg-orange">Pendiente</span>',
                    "7"=>($RegVA->Estado)?'<span class="label bg-green">Activado</span>':
                    '<span class="label bg-red">Desactivado</span>'
                    
                
                );
            }
        
            $Result = array(
        
                "sEcho"=>1,
                "iTotalRecords"=>count($DataVA),
                "ITotalDisplayRecords"=>count($DataVA),
                "aaData"=>$DataVA);
        
                echo json_encode($Result);
        
        
        
        }else{
        
        
            $RsptaVA=$MVariaciones->ListarVariaciones($IdPedidoSemanal);
           
            $DataVA = Array();
        
            while($RegVA=$RsptaVA->fetch_object()){
        
                $DataVA[]=array(
                 
                    
        
        
        
                    "0"=>($RegVA->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$RegVA->IdVariaciones.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="Desactivar('.$RegVA->IdVariaciones.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="Mostrar('.$RegVA->IdVariaciones.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-success" onclick="Activar('.$RegVA->IdVariaciones.')"><i class="fa fa-check"></i></button>',
        
                    "1"=>($RegVA->EstadoVA)?' <button class="btn btn-warning" onclick="Rechazar('.$RegVA->IdVariaciones.')"><i class="fa fa-close"></i></button>':
                    ' <button class="btn btn-success" onclick="Aceptar('.$RegVA->IdVariaciones.')"><i class="fa fa-check"></i></button>',

                  
                    "2"=>$RegVA->CantidadBatch,
                    "3"=>$RegVA->Motivo,
                    "4"=>$RegVA->Detalle,
                    "5"=>$RegVA->Usuario,
                    "6"=>$RegVA->Fecha,
                   
                    "7"=>($RegVA->EstadoVA)?'<span class="label bg-green">Aceptado</span>':
                    '<span class="label bg-orange">Pendiente</span>',
                    "8"=>($RegVA->Estado)?'<span class="label bg-green">Activado</span>':
                    '<span class="label bg-red">Desactivado</span>'
                    
                    
                    
                
                );
            }
        
            $Result = array(
        
                "sEcho"=>1,
                "iTotalRecords"=>count($DataVA),
                "ITotalDisplayRecords"=>count($DataVA),
                "aaData"=>$DataVA);
        
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