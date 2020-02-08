<?php

require_once "../Modelos/MVehiculo.php";

$MVehiculo= new MVehiculo();

$IdPlaca=isset($_POST["IdPlaca"]) ? limpiarCadena($_POST["IdPlaca"]):"" ;
$Placa=isset($_POST["Placa"]) ? limpiarCadena($_POST["Placa"]):"";
$Marca=isset($_POST["Marca"]) ? limpiarCadena($_POST["Marca"]):"";
$Compartimientos=isset($_POST["Compartimientos"]) ? limpiarCadena($_POST["Compartimientos"]):"";
$IdEmpreTrans=isset($_POST["IdEmpreTrans"]) ? limpiarCadena($_POST["IdEmpreTrans"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdPlaca)){
$Rspta=$MVehiculo->Insertar($Placa, $Marca, $Compartimientos, $IdEmpreTrans);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MVehiculo->Editar($IdPlaca, $Placa, $Marca, $Compartimientos, $IdEmpreTrans);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MVehiculo->Desactivar($IdPlaca);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MVehiculo->Activar($IdPlaca);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MVehiculo->Mostrar($IdPlaca);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MVehiculo->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdPlaca.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdPlaca.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdPlaca.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdPlaca.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->Placa,
            "2"=>$Reg->Marca,
           // "3"=>$Reg->IdTipoProducto,
            "3"=>$Reg->Compartimientos,
            "4"=>$Reg->RazonSocial,
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

case "SelectEmpreTrans":

    require_once "../Modelos/MEmpreTrans.php";
    $MEmpreTrans = new MEmpreTrans();

    $Rspta=$MEmpreTrans->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdEmpreTrans.'>'.$Reg->RazonSocial.'</option>';

    }


break;

}

?>