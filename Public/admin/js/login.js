$(document).ready(inicio);
var arr;

function inicio() {

    $('#etiCorreo').hide();
    $('#etiUsuarioU').hide();

  
        document.getElementById('pCorreo').addEventListener('input', validarCorreo, false);
       $("#AbrirModal").click(limpiarmodal);
       

}
function limpiarmodal() {
    $('#Respassform').each(function () {

        this.reset();

    });
  

}



function validarCorreo() {
    var valor = ($('#pCorreo').val());
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(valor)) {
        $('#pCorreo').css("color", "red");
        $('#etiCorreo').show();
        $('#etiCorreo').css("color", "red");
    }

    else {
        $('#pCorreo').css("color", "black")
        $('#etiCorreo').hide();
    }

}



function validarCorreoEnviar() {
    var valor = ($('#pCorreo').val());
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(valor)) {
        alert("El correo no es valido");
        return false;
    }
    else
        return true;


}

function validarUsuaEnviar() {
    var valor = ($('#pUsuario').val());
    if (valor == "") {
        alert("El Usuario no puede ser vacío");
        return false;
    }
    else
        return true;


}





function ResPass() {
    if (!validarCorreoEnviar()) { }
    else if (!validarUsuaEnviar()) { }
    else {
        $.post("ResPass.php", {
            User: $("#pUsuario").val(),
            Email: $("#pCorreo").val()
        }
            ).done(function (data) {
                data = JSON.parse(data);
                if (data.Res === "Si") {
                    alert('Se envió un correo a con la nueva contraseña');
                    location.reload();
                    $('#etiUsuarioU').hide();
                    $('#etiUsuarioU').css("color", "red");
                }
                else {
                    $('#etiUsuarioU').show();
                    $('#etiUsuarioU').css("color", "red");
                }
            })
    }
}



