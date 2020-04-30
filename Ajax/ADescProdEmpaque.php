<?php

require_once "../Modelos/MDescProdEmpaque.php";

$MDescProdEmpaque= new MDescProdEmpaque();

$IdDescProdEmpaque=isset($_POST["IdDescProdEmpaque"]) ? limpiarCadena($_POST["IdDescProdEmpaque"]):"" ;
$IdDescProd=isset($_POST["IdDescProd"]) ? limpiarCadena($_POST["IdDescProd"]):"";
$Presentacion=isset($_POST["Presentacion"]) ? limpiarCadena($_POST["Presentacion"]):"";
$Paquete=isset($_POST["Paquete"]) ? limpiarCadena($_POST["Paquete"]):"";
$Unidad=isset($_POST["Unidad"]) ? limpiarCadena($_POST["Unidad"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdDescProdEmpaque)){
$Rspta=$MDescProdEmpaque->Insertar($IdDescProd, $Presentacion, $Paquete, $Unidad);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MDescProdEmpaque->Editar($IdDescProdEmpaque,$IdDescProd, $Presentacion, $Paquete, $Unidad);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MDescProdEmpaque->Desactivar($IdDescProdEmpaque);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MDescProdEmpaque->Activar($IdDescProdEmpaque);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MDescProdEmpaque->Mostrar($IdDescProdEmpaque);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MDescProdEmpaque->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdDescProdEmpaque.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdDescProdEmpaque.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdDescProdEmpaque.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdDescProdEmpaque.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->DescProd,
            "2"=>$Reg->Presentacion,
           
            "3"=>$Reg->Paquete,
            "4"=>$Reg->Unidad,
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