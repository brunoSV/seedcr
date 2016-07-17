<?php



//Metodo post campos :
// .............................    'User'       ==> varchar
// Retorna :
// .............................    Json 'Res'   ==> 'Si'











function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña, en mi caso 5
    $longitudPass=5;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}

$us = $_POST["User"];

  $link = mysqli_connect('localhost', 'jm57592253', 'Jomialfa0605')or die('No se pudo conectar: ' . mysql_error());
    
  $nombreConexion=mysqli_select_db($link,'seedAdmin') or die('No se pudo seleccionar la base de datos');
  $result = mysqli_query($link, 'call Sp_GetEmail("'.$us.'")')
  or die('1No se pudo sacar la base de datos');

$i+0;
while($row=mysqli_fetch_array($result))
{
    $restem['Correo'] = $row['Correo'];
    break;
}



    $p = generaPass();
    $p1 = crypt($p,"absifkjsdoaiownvasdv56ds45sdalf");


  $link = mysqli_connect('localhost', 'jm57592253', 'Jomialfa0605')or die('No se pudo conectar: ' . mysql_error());
    
  $nombreConexion=mysqli_select_db($link,'seedAdmin') or die('No se pudo seleccionar la base de datos');

  $result = mysqli_query($link, 'call Sp_SetPass("'.$us.'","'.$p1.'")')
  or die('1No se pudo sacar la base de datos');
$correo =$restem['Correo'];
mail($correo, "Recuperar Contraseña", "La contraseña genereada es la siguiente: ".$p."", "From: noreplay@seedcr.com"); 



    $respuesta["Res"]="Si";
    echo(json_encode($respuesta));


?>