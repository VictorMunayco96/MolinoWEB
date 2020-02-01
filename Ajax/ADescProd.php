<?php

require_once "../Modelos/MDescProd.php";

$MDescProd= new MDescProd();

$IdDescProd=isset($_POST["IdDescProd"]) ? limpiarCadena($_POST["IdDescProd"]):"" ;
$DescProd=isset($_POST["DescProd"]) ? limpiarCadena($_POST["DescProd"]):"";
$CodDescProd=isset($_POST["CodDescProd"]) ? limpiarCadena($_POST["CodDescProd"]):"";
$IdProducto=isset($_POST["IdProducto"]) ? limpiarCadena($_POST["IdProducto"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdProducto)){
$Rspta=$MDescProd->Insertar($DescProd,$CodDescProd,$IdProducto);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MDescProd->Editar($IdDescProd,$DescProd,$CodDescProd,$IdProducto);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MDescProd->Desactivar($IdDescProd);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MDescProd->Activar($IdDescProd);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MDescProd->Mostrar($IdDescProd);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MDescProd->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdDescProd.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdDescProd.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdDescProd.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdDescProd.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->DescProd,
            "2"=>$Reg->CodDescProd,
           // "3"=>$Reg->IdTipoProducto,
            "3"=>$Reg->Producto,
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

case "SelectProducto":

    require_once "../Modelos/MProducto.php";
    $MProducto = new MProducto();

    $Rspta=$MProducto->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdProducto.'>'.$Reg->Producto.'</option>';

    }


break;

}

?>