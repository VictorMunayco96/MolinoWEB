
$("#frmAcceso").on('submit',function(e)
{
    e.preventDefault();
    logina=$("#logina").val();
    clavea=$("#clavea").val();
 
    $.post("../Ajax/AUsuario.php?Op=verificar",
        {"logina":logina,"clavea":clavea},
        function(data)
    {
       
        if (data!="null")
        {
            $(location).attr("href","TipoProducto.php");            
        }
        else
        {
            bootbox.alert("Usuario y/o Password incorrectos");
        }
    });
})