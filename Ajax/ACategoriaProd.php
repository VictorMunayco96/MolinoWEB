<?php

require_once "../Modelos/MCategoriaProd.php";

$MCategoriaProd= new MCategoriaProd();

$IdCategoriaProd=isset($_POST["IdCategoriaProd"]) ? limpiarCadena($_POST["IdTipoProducto"]):"" ;
$CategoriaProd=isset($_POST["CategoriaProd"]) ? limpiarCadena($_POST["TipoProducto"]):"";
$CodCategoriaProd=isset($_POST["CodCategoriaProd"]) ? limpiarCadena($_POST["CodTipoProducto"]):"";
$IdTipoProducto=isset($_POST["IdTipoProducto"]) ? limpiarCadena($_POST["CodTipoProducto"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdCategoriaProd)){
$Rspta=$MCategoriaProd->Insertar($CategoriaProd,$CodCategoria,$IdTipoProducto);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MCategoriaProd->Editar($IdCategoriaProd,$CategoriaProd,$CodCategoria,$IdTipoProducto);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MCategoriaProd->Desactivar($IdCategoriaProd);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MCategoriaProd->Activar($IdCategoriaProd);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MCategoriaProd->Mostrar($IdCategoriaProd);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MCategoriaProd->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdCategoriaProd.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdCategoriaProd.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdCategoriaProd.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdCategoriaProd.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->CategoriaProd,
            "2"=>$Reg->CodCategoria,
           // "3"=>$Reg->IdTipoProducto,
            "3"=>$Reg->TipoProducto,
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



}

?>