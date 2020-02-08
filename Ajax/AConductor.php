<?php

require_once "../Modelos/MConductor.php";

$MConductor= new MConductor();

$IdConductor=isset($_POST["IdConductor"]) ? limpiarCadena($_POST["IdConductor"]):"" ;
$CodConduc=isset($_POST["CodConduc"]) ? limpiarCadena($_POST["CodConduc"]):"";
$DNI=isset($_POST["DNI"]) ? limpiarCadena($_POST["DNI"]):"";
$Licencia=isset($_POST["Licencia"]) ? limpiarCadena($_POST["Licencia"]):"";
$Nombre=isset($_POST["Nombre"]) ? limpiarCadena($_POST["Nombre"]):"";
$Apellidos=isset($_POST["Apellidos"]) ? limpiarCadena($_POST["Apellidos"]):"";
$Nacionalidad=isset($_POST["Nacionalidad"]) ? limpiarCadena($_POST["Nacionalidad"]):"";
$TipoBrevete=isset($_POST["TipoBrevete"]) ? limpiarCadena($_POST["TipoBrevete"]):"";
$Condicion=isset($_POST["Condicion"]) ? limpiarCadena($_POST["Condicion"]):"";
$Observacion=isset($_POST["Observacion"]) ? limpiarCadena($_POST["Observacion"]):"";




switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdConductor)){
$Rspta=$MConductor->Insertar($CodConduc, $DNI, $Licencia, $Nombre, $Apellidos, $Nacionalidad, $TipoBrevete, $Condicion, $Observacion);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MConductor->Editar($IdConductor, $CodConduc, $DNI, $Licencia, $Nombre, $Apellidos, $Nacionalidad, $TipoBrevete, $Condicion, $Observacion);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MConductor->Desactivar($IdConductor);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MConductor->Activar($IdConductor);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MConductor->Mostrar($IdConductor);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MConductor->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdConductor.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdConductor.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdConductor.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdConductor.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->CodConduc,
            "2"=>$Reg->DNI,
           // "3"=>$Reg->IdTipoProducto,
            "3"=>$Reg->Licencia,
            "4"=>$Reg->Nombre." ".$Reg->Apellidos,
            //"5"=>$Reg->Apellidos,
            "5"=>$Reg->Nacionalidad,
            "6"=>$Reg->TipoBrevete,
            "7"=>$Reg->Condicion,
            "8"=>$Reg->Observacion,
            "9"=>($Reg->Estado)?'<span class="label bg-green">Activado</span>':
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