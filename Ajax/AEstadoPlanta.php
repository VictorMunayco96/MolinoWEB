<?php
ob_start();
session_start();
require_once "../Modelos/MEstadoPlanta.php";

$MEstadoPlanta= new MEstadoPlanta();


$IdEstadoPlanta=isset($_POST["IdEstadoPlanta"]) ? limpiarCadena($_POST["IdEstadoPlanta"]):"" ;
$EstadoPlanta=isset($_POST["EstadoPlanta"]) ? limpiarCadena($_POST["EstadoPlanta"]):"" ;
$Tema=isset($_POST["Tema"]) ? limpiarCadena($_POST["Tema"]):"" ;
$Detalle=isset($_POST["Detalle"]) ? limpiarCadena($_POST["Detalle"]):"" ;
$IdUsuario=$_SESSION['IdUsuario'] ;
$NumSemana=$_SESSION['NumSemana'] ;




switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdEstadoPlanta)){
  
$Rspta=$MEstadoPlanta->Insertar($EstadoPlanta, $Tema, $Detalle,$IdUsuario, $NumSemana);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MEstadoPlanta->Editar($IdEstadoPlanta,$EstadoPlanta, $Tema, $Detalle,$IdUsuario, $NumSemana);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    
}
break;

case 'Desactivar':

$Rspta=$MEstadoPlanta->Desactivar($IdEstadoPlanta);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;

case 'ActualizarHoraFin':

    $Rspta=$MEstadoPlanta->ActualizarHoraFin();
   
    
    break;



case 'Activar':

    $Rspta=$MEstadoPlanta->Activar($IdEstadoPlanta);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MEstadoPlanta->Mostrar($IdEstadoPlanta);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MEstadoPlanta->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdEstadoPlanta.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdEstadoPlanta.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdEstadoPlanta.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdEstadoPlanta.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->EstadoPlanta,
            "2"=>$Reg->Tema,
        
            "3"=>$Reg->Detalle,
            "4"=>$Reg->HoraInicio,
            "5"=>$Reg->HoraFin,
            "6"=>$Reg->Usuario,
            "7"=>$Reg->NumSemana,
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