var tabla;

function init(){

MostrarForm();


$("#Formulario").on("submit",function(e){

    GuardaryEditar(e);

})



$.post("../Ajax/ABalanzaReg.php?Op=SelectProveClien", function(r){

    $("#IdProveClien").html(r);
    $('#IdProveClien').selectpicker('refresh');
        
    });


    $.post("../Ajax/ABalanzaReg.php?Op=SelectConductorVehiculo", function(r){

        $("#IdConductorVehiculo").html(r);
        $('#IdConductorVehiculo').selectpicker('refresh');
            
        });

        $.post("../Ajax/ABalanzaReg.php?Op=SelectDestinoBloq", function(r){

            $("#IdDestinoBloq").html(r);
            $('#IdDestinoBloq').selectpicker('refresh');
                
            });

            $.post("../Ajax/ABalanzaReg.php?Op=SelectDescProd", function(r){

                $("#IdDescProd").html(r);
                $('#IdDescProd').selectpicker('refresh');
                    
                });


}



function limpiar(){

 
$("#NumGuia").val("");
$("#PesoCE").val("");
$("#PesoCS").val("");
$("#NetoC").val("");
$("#ObservS").val("");



}

function MostrarForm(f){

limpiar();



$("#FormularioRegistros").show();






}

function CancelarForm(){

    limpiar();
    MostrarForm(false);
}


function GuardaryEditar(e){

e.preventDefault();
$("#BtnGuardar").prop("disabled",true);
var formData= new FormData($("#Formulario")[0]);

$.ajax({

url: "../Ajax/ABalanzaReg.php?Op=GuardaryEditar",
type: "POST",
data: formData,
contentType: false,
processData: false,

success: function(datos){

    bootbox.alert(datos);
    MostrarForm(false);
    tabla.ajax.reload();

}


});

limpiar();
}




init();