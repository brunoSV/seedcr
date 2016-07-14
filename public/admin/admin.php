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
    <link rel="icon" type="image/jp">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js"></script>
    <script src="js/getBlogAdmin.js"></script>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">


    <script src="js/bootstrap.js"></script>
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

    <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal" id='AbrirModal'>Nuevo Blog</button>
    <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myMo2">Cambio de Contraseña</button>
    <section id="result"></section>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ingresar nuevo blog</h4>
                </div>
                <div class="modal-body">
                    <div id="NewBlog">
                        <form id="newblogform">
                            <label>Titulo del blog: </label><input type="text" class="form-control" name="pTitulo"><br />
                            <label>Nombre del autor: </label><input type="text" class="form-control" name="pNombreAutor"><br />
                            <label>Cuerpo del blog: </label><textarea type="text" class="form-control TextAreaTamañoFijo" maxlength="2000" name="pCuerpo" id='textCuerpo'></textarea>
                            Cantidad de Caracteres: <div id='numCar'></div><br />
                            <label>Fecha de la publicación: </label><input type="date" class="form-control" name="pFecha"><br />
                            <label>Imagen del blog: </label><input type="file" class="form-control" id="file" name="file">
                            <input type="checkbox" name="pBit">Ingles<br />
                            <button class="btn btn-default" onclick="SaveBlog()">Guardar</button><br />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                        </form>
                        <div id="list"></div>
                    </div>

                </div>
                <div class="modal-footer">
                </div>
            </div>

        </div>
    </div>


   
    
    
    
     <!-- Cambio Contraseña -->
    <div id="myMo2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cambio Contraseña</h4>
                </div>
                <div class="modal-body">
                    <div id="NewPass">
                        <form id="NewPassform">
                            <label>Correo: </label><input type="email" class="form-control" name="pCorreo"><br />
                            <label>Contraseña: </label><input type="password" class="form-control" name="pContra1"><br />
                            <label>Contraseña: </label><input type="password" class="form-control" name="pContra2"><br />
                            <button class="btn btn-default" onclick="SaveBlog()">Guardar</button><br />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                        </form>
                        <div id="list"></div>
                    </div>

                </div>
                <div class="modal-footer">
                </div>
            </div>

        </div>
    </div>


</body>
</html>
