$(document).ready(inicio);
var arr;

function inicio(){

          $('#etiCorreo').hide();
          $('#etiPass').hide();
    $.post( "getBlogAdmin.php", function( data ) {
        arr = $.map(JSON.parse(data), function(el) { return el });
        for (i=0;i<arr.length;i++){
            $('#result').append(
                '<form class="form" >'+
                '<div class="form-group">'+
                '<label>Titulo del blog: </label><input class="form-control" type="text" name="pTitulo" value ="'+arr[i].titulo+'">'+
                '<label>Nombre del autor: </label><input class="form-control" type="text"  name="pNombreAutor" value ="'+arr[i].nombreAutor+'">'+
                '</div><div class="form-group">'+
                '<label>Cuerpo del blog: </label><textarea class="form-control TextAreaTamañoFijo" name="pCuerpo" >'+arr[i].cuerpo+'</textarea>'+
                '</div><div class="form-group">'+
                '<label>Fecha de la publicación: </label><input class="form-control" type="date" name="pFecha" value ="'+arr[i].fecha+'">'+arr[i].pBit+
                '<button class="btn btn-default" onclick = "UpdateBlog('+(i)+')">Guardar</button>'+
                '<button class="btn btn-default" onclick = "DeleteBlog('+(i)+')">Eliminar</button>'+
                '</div>'+
                '</form><hr>');
                
        }

          
          document.getElementById('pCorreo').addEventListener('input', validarCorreo, false);
          document.getElementById('pPass').addEventListener('input', validarPass, false);
          document.getElementById('pPass1').addEventListener('input', validarPass, false);
          document.getElementById('file').addEventListener('change', archivo, false);
          $("#AbrirModal").click(limpiarmodal);
          $("#AbrirModal1").click(limpiarmodal);
          document.getElementById('textCuerpo').addEventListener("input", function(){
             var v = wordCount( this.value );
             $('#numCar').text(v);
             if (v>=1800 && v <= 1900){
                 $('#numCar').text(v).css("color",'yellow');
            }
            else if(v >= 1900){
                 $('#numCar').text(v).css("color",'red');
            }
            else {
                 $('#numCar').text(v).css("color",'black');
            }
            }, false);
            
    });
}
function limpiarmodal(){
    $('#newblogform').each (function(){

  this.reset();

});
    $('#NewPassform').each (function(){

  this.reset();

});
$('#list').empty();

}
function validarCorreo(){
  var valor = ($('#pCorreo').val());
expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(valor) ){
        $('#pCorreo').css("color","red");
        $('#etiCorreo').show();
        $('#etiCorreo').css("color","red");
      }

    else{
        $('#pCorreo').css("color","black")
        $('#etiCorreo').hide();}

}
function validarPass (){
  var valor1 = ($('#pPass').val());
  var valor2 = ($('#pPass1').val());

    if ( valor2 != valor1 ){
        $('#pPass').css("color","red")
        $('#pPass1').css("color","red")
        $('#etiPass').show();
        $('#etiPass').css("color","red")}
    else{
        $('#pPass').css("color","black")
        $('#pPass1').css("color","black")
        $('#etiPass').hide();}

}

function validarCorreoEnviar(){
  var valor = ($('#pCorreo').val());
expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(valor) ){
        alert("El correo no es valido");
        return true;
      }
    else
      return false


}
function validarPassEnviar (){
  var valor1 = ($('#pPass').val());
  var valor2 = ($('#pPass1').val());

    if ( valor2 != valor1 ){
        alert("Las contraseñas son distintas");
        return true;
      }
    else
      return false

}


function UpdateBlog(num){
    var x ;
    if ( $("form")[num][5].checked){
        x = 1 ;
    }
    else{
        x=0;
    }
    $.post("UpdateBlog.php",{
        pId:arr[num].id,
        pNombreAutor:$("form")[num][1].value,
        pCuerpo:$("form")[num][2].value,
        pFecha:$("form")[num][3].value,
        pTitulo:$("form")[num][0].value,
        pExt:arr[num].ExtenImg,
        pIMG:arr[num].pathImg,
        pBit:x,
    },function(data){})
}
function DeleteBlog(num){
    $.post("DeleteBlog.php",{
        ID:arr[num].id}
           ,function(data){location.reload();})
}
function SaveBlog(){
    var x  = new FormData($("#newblogform")[0]);
    $.ajax({
                url: "InsertBlog.php",
                type: "POST",
                data: x,
                contentType: false,
                processData: false,
                success: function(datos)
                {
    
                }
            });
}
function archivo(evt) {
      var files = evt.target.files; // FileList object
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
}
function wordCount( val ){
    var wom = val.match(/\S+/g);
    return (val.length);
}


             
