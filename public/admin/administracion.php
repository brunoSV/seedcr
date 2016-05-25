<?php
  include 'session.inc';
  check_login();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js"></script>
    <script src="js/getBlogAdmin.js"></script>
    <title></title>
</head>

<body>
<div id="result"></div>
<div id="NewBlog">
    <form id="newblogform">
        <input type="text" name="pTitulo">
        <input type="text" name="pNombreAutor">
        <input type="text" name="pCuerpo">
        <input type="date" name="pFecha">
        <input type="file" name="file">
        <input type="checkbox" name="pBit" >Ingles
        <input type="button" value="Guardar">
    </form>
</div>
<div id="respuesta"></div>
</body>
</html>
