<?php

require_once "../Modelos/MUsuario.php";

$MUsuario= new MUsuario();

$IdUsuario=isset($_POST["IdUsuario"]) ? limpiarCadena($_POST["IdUsuario"]):"" ;
$Usuario=isset($_POST["Usuario"]) ? limpiarCadena($_POST["Usuario"]):"";
$Contrasena=isset($_POST["Contrasena"]) ? limpiarCadena($_POST["Contrasena"]):"";
$TipoUsuario=isset($_POST["TipoUsuario"]) ? limpiarCadena($_POST["TipoUsuario"]):"";
$IdEmpleado=isset($_POST["IdEmpleado"]) ? limpiarCadena($_POST["IdEmpleado"]):"";

switch ($_GET["Op"]){

case 'GuardaryEditar':

    $ClaveHash=hash("SHA256",$Contrasena);
if(empty($IdUsuario)){

$Rspta=$MUsuario->Insertar($Usuario,$ClaveHash,$TipoUsuario,$IdEmpleado,$_POST['Permiso']);
echo $Rspta ? "REGISTRADO" : "NO SE PUDO REGISTRAR";

}else{

    $Rspta=$MUsuario->Editar($IdUsuario,$Usuario, $ClaveHash, $TipoUsuario, $IdEmpleado,$_POST['Permiso']);
    echo $Rspta ? "EDITADO" : "NO SE PUDO EDITAR";
    

}
break;

case 'Desactivar':

$Rspta=$MUsuario->Desactivar($IdUsuario);
echo $Rspta ? "DESACTIVADO" : "NO SE PUDO DESACTIVAR";

break;



case 'Activar':

    $Rspta=$MUsuario->Activar($IdUsuario);
    echo $Rspta ? "ACTIVADO" : "NO SE PUDO ACTIVAR";
    
    break;

case 'Mostrar':

    $Rspta=$MUsuario->Mostrar($IdUsuario);
    echo json_encode($Rspta); 

break;

case 'Listar':

    $Rspta=$MUsuario->Listar();

    $Data = Array();

    while($Reg=$Rspta->fetch_object()){

        $Data[]=array(

            "0"=> ($Reg->Estado)?'<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdUsuario.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-danger" onclick="Desactivar('.$Reg->IdUsuario.')"><i class="fa fa-close"></i></button>':
            '<button class="btn btn-warning" onclick="Mostrar('.$Reg->IdUsuario.')"><i class="fa fa-pencil"></i></button>'.
            ' <button class="btn btn-success" onclick="Activar('.$Reg->IdUsuario.')"><i class="fa fa-check"></i></button>',
            "1"=>$Reg->Usuario,
           
            "2"=>$Reg->TipoUsuario,
            "3"=>$Reg->NombreE." ".$Reg->ApellidosE,
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

case "SelectEmpleado":

    require_once "../Modelos/MEmpleado.php";
    $MEmpleado = new MEmpleado();

    $Rspta=$MEmpleado->Select();

    while($Reg = $Rspta->fetch_object()){

        echo '<option value=' .$Reg->IdEmpleado.'>'.$Reg->NombreE." ".$Reg->ApellidosE.'</option>';

    }


break;

case "Permiso":
    require_once "../Modelos/MPermiso.php";
    $MPermiso = new MPermiso();
    $Rspta=$MPermiso->Listar();

//obtener permisos asignados
$Id=$_GET['Id'];
$Marcados=$MUsuario->ListarMarcados($Id);

$Valores=array();

while($Per = $Marcados->fetch_object()){

array_push($Valores, $Per->IdPermiso);

}



    while($Reg = $Rspta->fetch_object()){

        
        $Sw=in_array($Reg->IdPermiso,$Valores)?'checked':'';
        echo '<li><input type="checkbox" '.$Sw.' name="Permiso[]" value="'.$Reg->IdPermiso.'"> '.$Reg->Nombre.'</li>';

    }

    break;

}

?>