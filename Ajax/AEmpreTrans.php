<?php

require_once "../Modelos/MEmpreTrans.php";

$MEmpreTrans= new MEmpreTrans();

$IdEmpreTrans=isset($_POST["IdEmpreTrans"]) ? limpiarCadena($_POST["IdEmpreTrans"]):"" ;
$Ruc=isset($_POST["RUC"]) ? limpiarCadena($_POST["RUC"]):"";
$RazonSocial=isset($_POST["RazonSocial"]) ? limpiarCadena($_POST["RazonSocial"]):"";
$Domicilio=isset($_POST["Domicilio"]) ? limpiarCadena($_POST["Domicilio"]):"";
$Correo=isset($_POST["Correo"]) ? limpiarCadena($_POST["Correo"]):"";
$NumCel=isset($_POST["NumCel"]) ? limpiarCadena($_POST["NumCel"]):"";
$Condicion=isset($_POST["Condicion"]) ? limpiarCadena($_POST["Condicion"]):"";
$Observ=isset($_POST["Observ"]) ? limpiarCadena($_POST["Observ"]):"";




switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdEmpreTrans)){
$Rspta=$MEmpreTrans->Insertar($Ruc, $RazonSocial, $Domicilio, $Correo, $NumCel, $Condicion, $Observ);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MEmpreTrans->Editar($IdEmpreTrans, $Ruc, $RazonSocial, $Domicilio, $Correo, $NumCel, $Condicion, $Observ);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    
}
break;

case 'Desactivar':

$Rspta=$MEmpreTrans->Desactivar($IdEmpreTrans);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MEmpreTrans->Activar($IdEmpreTrans);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MEmpreTrans->Mostrar($IdEmpreTrans);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MEmpreTrans->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdEmpreTrans.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdEmpreTrans.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdEmpreTrans.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdEmpreTrans.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->Ruc,
            "2"=>$Reg->RazonSocial,
           // "3"=>$Reg->IdTipoProducto,
            "3"=>$Reg->Domicilio,
            "4"=>$Reg->Correo,
            "5"=>$Reg->NumCel,
            "6"=>$Reg->Condicion,
            "7"=>$Reg->Observ,
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



}

?>