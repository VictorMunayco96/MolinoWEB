<?php
ob_start();
session_start();
require_once "../Modelos/MAlmacenEntrada.php";

$MAlmacenEntrada= new MAlmacenEntrada();

$IdAlmacenEntrada=isset($_POST["IdAlmacenEntrada"]) ? limpiarCadena($_POST["IdAlmacenEntrada"]):"" ;
$IdDescProdEmpaque=isset($_POST["IdDescProdEmpaque"]) ? limpiarCadena($_POST["IdDescProdEmpaque"]):"";
$Lote=isset($_POST["Lote"]) ? limpiarCadena($_POST["Lote"]):"";
$Cantidad=isset($_POST["Cantidad"]) ? limpiarCadena($_POST["Cantidad"]):"";
$Placa=isset($_POST["Placa"]) ? limpiarCadena($_POST["Placa"]):"";
$IdUsuario=$_SESSION['IdUsuario'];


switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdAlmacenEntrada)){

  
$Rspta=$MAlmacenEntrada->Insertar($IdDescProdEmpaque, $Lote, $Cantidad, $Placa, $IdUsuario);

echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MAlmacenEntrada->Editar($IdAlmacenEntrada,$IdDescProdEmpaque, $Lote, $Cantidad, $Placa, $IdUsuario);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$AlmacenEntrada->Desactivar($AlmacenEntrada);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MAlmacenEntrada->Activar($IdAlmacenEntrada);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Aceptar':

        $Rspta=$MAlmacenEntrada->Aceptar($IdAlmacenEntrada);
        echo $Rspta ? "ACEPTADO" : "NO SE PUDO ACEPTAR";
        
        break;

case 'Rechazar':

            $Rspta=$MAlmacenEntrada->Rechazar($IdAlmacenEntrada);
            echo $Rspta ? "RECHAZADO" : "NO SE PUDO RECHAZAR";
            
            break;

case 'Mostrar':

    $Rspta=$MAlmacenEntrada->Mostrar($IdAlmacenEntrada);
    echo json_encode($Rspta); 

break;


case 'ListarDescProdEmpaque':

    $Rspta=$->ListarDescProdEmpaque();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>'<button class="btn btn-success" onclick="AgregarEntrada('.$Reg->IdDescProdEmpaque.')"><i class="fa fa-plus"></i></button>
            <button class="btn btn-warning" onclick="ListarProducto('.$Reg->IdDescProdEmpaque.')"><i class="fa fa-eye"></i></button>',
       
            
            "1"=>$Reg->DescProd,
            "2"=>$Reg->Presentacion,
            "3"=>$Reg->Paquete,
            "4"=>$Reg->Unidad,
            "5"=>$Reg->Ingreso,
            "6"=>$Reg->Salida,
            "7"=>($Reg->Ingreso-$Reg->Salida),
            "8"=>($Reg->Estado)?'<span class="label bg-green">Activado</span>':
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

case 'ListarAlmacenEntrada':

    $Rspta=$->ListarCabeceraPedido($_SESSION['NumSemana']);

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