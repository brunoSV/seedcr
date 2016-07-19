
<?php
//Metodo post campos :
// .............................    'ID' ==> int
// Retorna :
// .............................    Json 'Res' ==> 'Si'

$link = mysqli_connect('107.180.58.44', 'jm57592253', 'Jomialfa0605')or die('No se pudo conectar: ' . mysql_error());

$nombreConexion=mysqli_select_db($link,'seedAdmin') or die('No se pudo seleccionar la base de datos');
$result = mysqli_query($link, 'call Sp_DeleteBlog('.$_POST["ID"].')')
or die('1No se pudo sacar la base de datos');

$respuesta["Res"]='Si';


echo(json_encode($respuesta));



?>    