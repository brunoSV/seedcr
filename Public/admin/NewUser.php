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
$result = mysqli_query($link, 'call Sp_InsertUser("'.$user.'","'.$p1.'","'.$email.'")')
or die('1No se pudo sacar la base de datos');

while($row=mysqli_fetch_array($result))
{
    $restem['res'] = $row['res'];
    break;
}

if($restem['res']== -1 )
{
    $respuesta["Res"]="-1";
}
else
{
    
    $respuesta["Res"]="SI";
}

echo(json_encode($respuesta));


?>