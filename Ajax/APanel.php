<?php
ob_start();
session_start();
require_once "../Modelos/MPanel.php";

$MPanel= new MPanel();

$IdPanel=isset($_POST["IdPanel"]) ? limpiarCadena($_POST["IdPanel"]):"" ;
$IdPedido=isset($_POST["IdPedido"]) ? limpiarCadena($_POST["IdPedido"]):"";
$CodProduccion=isset($_POST["CodProduccion"]) ? limpiarCadena($_POST["CodProduccion"]):"";
$NumSilo=isset($_POST["NumSilo"]) ? limpiarCadena($_POST["NumSilo"]):"";
$CantidadBatch=isset($_POST["CantidadBatch"]) ? limpiarCadena($_POST["CantidadBatch"]):"";
$PesoPanel=isset($_POST["PesoPanel"]) ? limpiarCadena($_POST["PesoPanel"]):"";
$IdUsuario=$_SESSION['IdUsuario']; 
$NumSemana=$_SESSION['NumSemana'];



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdPanel)){

  
$Rspta=$MPanel->Insertar($IdPedido, $CodProduccion, $NumSilo, $CantidadBatch, $PesoPanel, $IdUsuario, $NumSemana);

echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MPanel->Editar($IdPanel, $IdPedido, $CodProduccion, $NumSilo, $CantidadBatch, $PesoPanel, $IdUsuario, $NumSemana);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MPanel->Desactivar($IdPanel);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MPanel->Activar($IdPanel);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'MostrarPedido':

    $Rspta=$MPanel->MostrarPedido($IdPedido);
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

         
            



            "0"=> '<button class="btn btn-success" onclick="MostrarPedido('.$RegP->IdPedido.')"><i class="fa fa-plus"></i></button>'          ,

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






case 'ListarPanel':


    
    
    
    
    
        $RsptaPA=$MPanel->ListarPanel();
       
        $DataPA = Array();
    
        while($RegPA=$RsptaPA->fetch_object()){
    
            $DataPA[]=array(
    
             
                
    
    
    
                "0"=> ($RegPA->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$RegPA->IdPanel.')"><i class="fa fa-pencil"></i></button>'.
                ' <button class="btn btn-danger" onclick="Desactivar('.$RegPA->IdPanel.')"><i class="fa fa-close"></i></button>':
                '<button class="btn btn-warning" onclick="Mostrar('.$RegPA->IdPanel.')"><i class="fa fa-pencil"></i></button>'.
                ' <button class="btn btn-success" onclick="Activar('.$RegPA->IdPanel.')"><i class="fa fa-check"></i></button>',
                "1"=>$RegPA->CodProduccion,
                "2"=>$RegPA->DestinoDes,
                "3"=>$RegPA->TipoTransporte,
                "4"=>$RegPA->CantidadBatch,
                "5"=>$RegPA->NumSilo,
                "6"=>$RegPA->PesoPanel,
                
                "7"=>$RegPA->Usuario,
                "8"=>$RegPA->Fecha,
               
                "9"=>($RegPA->Estado)?'<span class="label bg-green">Activado</span>':
                '<span class="label bg-red">Desactivado</span>'
                
            
            );
        }
    
        $ResultPA = array(
    
            "sEcho"=>1,
            "iTotalRecords"=>count($DataPA),
            "ITotalDisplayRecords"=>count($DataPA),
            "aaData"=>$DataPA);
    
            echo json_encode($ResultPA);
    
    
    
    
        
    
    
    
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