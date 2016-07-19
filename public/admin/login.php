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
        mysql_close($link);
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

if (isset ($_POST['login']) && ($_POST['login'] == 'Login') &&
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
  <div class="wrapper">
    <form id="form" class="form-signin" action="login.php" method="post" enctype="multipart/form-data">
      <fieldset>
        <h3 class="form-signin-heading">Login</h3>
        <input type="text" class="form-control" placeholder="Username" name="User">
        <input type="password" class="form-control" placeholder="Password" name="pass" >
        <label class="checkbox">
          <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
        </label>
      </fieldset>
      <input type="submit" class="btn btn-lg btn-primary btn-block" name="login" value="Login">
    </form>
  </div>



<?php
}
?>
<?php ob_end_flush(); ?>
