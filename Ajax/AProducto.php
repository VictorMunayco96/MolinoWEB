<?php

require_once "../Modelos/MProducto.php";

$MProducto= new MProducto();

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

case 'Listar':

    $Rspta=$MProducto->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdProducto.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdProducto.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdProducto.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdProducto.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->Producto,
            "2"=>$Reg->NombreGuia,
           // "3"=>$Reg->IdTipoProducto,
            "3"=>$Reg->CodProducto,
            "4"=>$Reg->CategoriaProd,
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