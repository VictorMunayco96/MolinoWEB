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

$Rspta=$MAlmacenEntrada->Desactivar($IdAlmacenEntrada);
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

    $Rspta=$MAlmacenEntrada->ListarDescProdEmpaque();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>'<button class="btn btn-success" onclick="AgregarAlmacenEntrada('.$Reg->IdDescProdEmpaque.')"><i class="fa fa-plus"></i></button>
            <button class="btn btn-warning" onclick="ListarAlmacenEntrada('.$Reg->IdDescProdEmpaque.')"><i class="fa fa-eye"></i></button>',
       
            
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

    $IdDescProdEmpaque=$_REQUEST['IdDescProdEmpaque'];

    $Rspta=$MAlmacenEntrada->ListarAlmacenEntrada($IdDescProdEmpaque);
   

    $Data= Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdAlmacenEntrada.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdAlmacenEntrada.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdAlmacenEntrada.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdAlmacenEntrada.')"><i class="fa fa-check"></i></button>',

            "1"=>($Reg->EstadoL)?' <button class="btn btn-warning" onclick="Rechazar('.$Reg->IdAlmacenEntrada.')"><i class="fa fa-close"></i></button>':
            ' <button class="btn btn-success" onclick="Aceptar('.$Reg->IdAlmacenEntrada.')"><i class="fa fa-check"></i></button>',
            "2"=>$Reg->DescProd,
            "3"=>$Reg->Presentacion,
            "4"=>$Reg->Lote,
            "5"=>$Reg->Placa,
            "6"=>$Reg->Cantidad,
            "7"=>$Reg->Salida,
            "8"=>($Reg->Cantidad-$Reg->Salida),
            "9"=>$Reg->Fecha,
           
            
            "10"=>$Reg->Usuario,
            "11"=>($Reg->EstadoL)?'<span class="label bg-green">Aceptado</span>':
            '<span class="label bg-orange">Pendiente</span>',
            "12"=>($Reg->Estado)?'<span class="label bg-green">Activado</span>':
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