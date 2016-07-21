<?php ob_start(); ?>
<?php
include 'session.inc';
function getpass($u,$p)
{

    $link = mysqli_connect('107.180.58.44', 'jm57592253', 'Jomialfa0605')or die('No se pudo conectar: ' . mysql_error());

    $nombreConexion=mysqli_select_db($link,'seedAdmin') or die('No se pudo seleccionar la base de datos');
    $result = mysqli_query($link, 'call Sp_Logins("'.$u.'","'.$p.'")')
    or die('1No se pudo sacar la base de datos');

    $largo = mysqli_num_rows($result);

    if($largo==1){
        mysqli_data_seek ($result, $i);
        $extraido= mysqli_fetch_array($result)or die('2No se pudo sacar de la base de datos');

        $res = $extraido[0];

        return ($res);
    }
    else
    {
        return (" ");
    }

}
function check_auth($u,$p) {

    $p1 = crypt($p,"absifkjsdoaiownvasdv56ds45sdalf");
    $pass = getpass($u,$p1);
    if (1 == $pass){
        return true;
    }
    else {
        return false;
    }

}

if (isset ($_POST['login']) && ($_POST['login'] == 'login') &&
($uid = check_auth($_POST['User'], $_POST['pass'])))
{
    /* Usuario autenticado, inicializa la cookie */
    $_SESSION['uid'] = $uid;
    header('Location: admin.php');

}
else{?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/jpeg" href="img/logourl.jpg" />

  <title>s.e.e.d.</title>

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/login.js"></script>

  <!-- Custom Fonts -->
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css" />
  <link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="css/animate.min.css" type="text/css">

  <!-- Custom CSS -->
  <!-- Needed for the font and text styles -->
  <link rel="stylesheet" href="css/creative.css" type="text/css">

  <!-- Custom CSS for login page -->
  <link rel="stylesheet" href="css/style_login.css" type="text/css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>
  <div>
    <form id="form" class="form-signin" action="login.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <h3 class="form-signin-heading">Login</h3>
        <input type="text" class="form-control" required placeholder="Username" name="User">
        <input type="password" class="form-control" required placeholder="Password" name="pass" >
      </fieldset>
      <input type="submit" class="btn btn-lg btn-primary btn-block" name="login" value="login">    
      <button type="button" class="btn btn-lg btn-primary btn-block" data-toggle="modal" data-target="#myModal" id='AbrirModal'>Restablecer Contraseña</button>
    </form>
 </div>
     
 <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ingresar nuevo blog</h4>
                </div>
                <div class="modal-body">
                    <div id="Respass">
                        <form id="Respassform">
                            
                            <label id="etiCorreo">El correo no es válido</label><br>
                            <label>Correo: </label><input type="email" class="form-control" required name="pCorreo"id="pCorreo"><br />
                            <label id="etiUsuarioU">El usuario y el correo no coinside</label><br>
                            <label>Usuario: </label><input type="text" class="form-control" required name="pUsuario"id="pUsuario"><br />
                            <button type="button"  class="btn btn-default" onclick="ResPass()">Restablecer contraseña</button><br /><br />

                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
                <div class="modal-footer">
                </div>
            </div>

        </div>
    </div>
  
</body>
</html>
<?php
}
