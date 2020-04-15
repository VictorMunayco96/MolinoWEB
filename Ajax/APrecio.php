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
$Rspta=$MPrecio->Insertar($Precio, $NumSemana, $IdDescProd);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MPrecio->Editar($IdPrecio,$Precio, $NumSemana, $IdDescProd);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MPrecio->Desactivar($IdPrecio);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MPrecio->Activar($Precio);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MPrecio->Mostrar($IdPrecio);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MPrecio->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdPrecio.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdPrecio.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdPrecio.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdPrecio.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->DescProd,
            "2"=>$Reg->Precio,
            "3"=>$Reg->NumSemana,
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