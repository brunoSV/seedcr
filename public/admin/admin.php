<?php
  include 'session.inc';
  check_login();
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="s.e.e.d. main page">
        <meta name="author" content="">
        <link rel="icon" type="image/jp
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery.js"></script>
        <script src="js/getBlogAdmin.js"></script>
            <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">


        <!-- Custom Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css" />
        <link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="css/animate.min.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/creative.css" type="text/css">
        <title></title>
    </head>

    <body>
        <div class="header-content">
            <div class="header-content-inner text">

                <img src="img/logo-blanco.png" width="1%">
                <h3>s.e.e.d. ADMIN</h3>

            </div>
        </div>
        <section id="result"></section>
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

    </body>
</html>
