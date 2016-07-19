<?php



//Metodo post campos :
// .............................    'User'       ==> varchar
// .............................    'Email'      ==> varchar
// .............................    'Pass'       ==> varchar
// Retorna :
// .............................    Json 'Res'   ==> 'Si' Correcto
//..............................                 ==> '-1' Si el usuario o el correo existe






$user = $_POST["User"];
$email = $_POST["Email"];
$pass = $_POST["Pass"];
$p1 = crypt($pass,"absifkjsdoaiownvasdv56ds45sdalf");

$link = mysqli_connect('localhost', 'jm57592253', 'Jomialfa0605')or die('No se pudo conectar: ' . mysql_error());

$nombreConexion=mysqli_select_db($link,'seedAdmin') or die('No se pudo seleccionar la base de datos');
$result = mysqli_query($link, 'call Sp_GetEmail("'.$user.'")')
or die('1No se pudo sacar la base de datos');

$i+0;
while($row=mysqli_fetch_array($result))
{
    $restem['Correo'] = $row['Correo'];
    break;
}

if($email != $restem['Correo'] )
{
    $respuesta["Res"]="-2";
}
else{


    $link = mysqli_connect('localhost', 'jm57592253', 'Jomialfa0605')or die('No se pudo conectar: ' . mysql_error());

    $nombreConexion=mysqli_select_db($link,'seedAdmin') or die('No se pudo seleccionar la base de datos');

    $result = mysqli_query($link, 'call Sp_SetPass("'.$us.'","'.$p1.'")')
    or die('1No se pudo sacar la base de datos');
    $correo =$restem['Correo'];
    mail($correo, "Recuperar Contraseña", "La contraseña genereada es la siguiente: ".$p."", "From: noreplay@seedcr.com"); 
    $respuesta["Res"]="Si";

}


echo(json_encode($respuesta));


?>