<?php
  $link = mysqli_connect('107.180.58.44', 'jm57592253', 'Jomialfa0605')or die('No se pudo conectar: ' . mysql_error());

  $nombreConexion=mysqli_select_db($link,'seedAdmin') or die('No se pudo seleccionar la base de datos');
  $result = mysqli_query($link, 'call Sp_GetBlog()')
  or die('1No se pudo sacar la base de datos');

  $i=1;

  while($row=mysqli_fetch_array($result)) {
    $restem['id'] = $row['ID'];
    $restem['nombreAutor'] = $row['NombreAutor'];
    $restem['pathImg'] = $row['PathImg'];
    $restem['cuerpo'] = $row['Cuerpo'];
    $restem['fecha'] = $row['Fecha'];
    $restem['titulo'] = $row['Titulo'];
    $restem['ExtenImg'] = $row['ExtenImg'];
    $restem['pBit'] = $row['Activo'];

    $respuesta[$i]=$restem;
    $i++;
  }
  echo(json_encode($respuesta));
?>