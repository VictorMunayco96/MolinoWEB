<?php

require_once "../Modelos/MEmpleado.php";

$MEmpleado= new MEmpleado();

$IdEmpleado=isset($_POST["IdEmpleado"]) ? limpiarCadena($_POST["IdEmpleado"]):"" ;
$DNI=isset($_POST["DNI"]) ? limpiarCadena($_POST["DNI"]):"";
$Codigo=isset($_POST["Codigo"]) ? limpiarCadena($_POST["Codigo"]):"";
$NombreE=isset($_POST["NombreE"]) ? limpiarCadena($_POST["NombreE"]):"";
$ApellidosE=isset($_POST["ApellidosE"]) ? limpiarCadena($_POST["ApellidosE"]):"";
$Telefono=isset($_POST["Telefono"]) ? limpiarCadena($_POST["Telefono"]):"";
$Celular=isset($_POST["Celular"]) ? limpiarCadena($_POST["Celular"]):"";
$FechaIngreso=isset($_POST["FechaIngreso"]) ? limpiarCadena($_POST["FechaIngreso"]):"";



switch ($_GET["Op"]){

case 'GuardaryEditar':
if(empty($IdEmpleado)){
$Rspta=$MEmpleado->Insertar($DNI, $Codigo, $NombreE, $ApellidosE, $Telefono, $Celular, $FechaIngreso);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MEmpleado->Editar($IdEmpleado,$DNI, $Codigo, $NombreE, $ApellidosE, $Telefono, $Celular, $FechaIngreso);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MEmpleado->Desactivar($IdEmpleado);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MEmpleado->Activar($IdEmpleado);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MEmpleado->Mostrar($IdEmpleado);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MEmpleado->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=>($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdEmpleado.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdEmpleado.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdEmpleado.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdEmpleado.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->DNI,
            "2"=>$Reg->Codigo,
            "3"=>$Reg->NombreE." ".$Reg->ApellidosE,
            //"4"=>$Reg->ApellidosE,
            "4"=>$Reg->Telefono,
            "5"=>$Reg->Celular,
            "6"=>$Reg->FechaIngreso,
            "7"=>($Reg->Estado)?'<span class="label bg-green">Activado</span>':
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