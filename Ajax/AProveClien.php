<?php

require_once "../Modelos/MProveClien.php";

$MProveClien= new MProveClien();

$IdProveClien=isset($_POST["IdProveClien"]) ? limpiarCadena($_POST["IdProveClien"]):"" ;
$RazonSocial=isset($_POST["RazonSocial"]) ? limpiarCadena($_POST["RazonSocial"]):"";
$Ruc=isset($_POST["Ruc"]) ? limpiarCadena($_POST["Ruc"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdProveClien)){
$Rspta=$MProveClien->Insertar($RazonSocial, $Ruc);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MProveClien->Editar($IdProveClien, $RazonSocial, $Ruc);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MProveClien->Desactivar($IdProveClien);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MProveClien->Activar($IdProveClien);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MProveClien->Mostrar($IdProveClien);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MProveClien->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdProveClien.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdProveClien.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdProveClien.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdProveClien.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->RazonSocial,
            "2"=>$Reg->Ruc,
            "3"=>($Reg->Estado)?'<span class="label bg-green">Activado</span>':
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