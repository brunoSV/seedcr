
<?php
//Metodo post campos :
// .............................    'pId'           ==> int  ------ Si es insert se pone 0
// .............................    'pNombreAutor'  ==> varchar(200)
// .............................    'pCuerpo'       ==> varchar(10000)
// .............................    'pFecha'        ==> date
// .............................    'pTitulo'       ==> varchar(200)
// .............................    'pExt'          ==> varchar(200)
// .............................    'pIMG'          ==> varchar(200)
// .............................    'pBit'          ==> bit ingles


//////////////////////////////////////////////////////////////////////////////////////////////////////////
///////                                                                                     //////////////
///////   http://jquery-manual.blogspot.com/2014/05/como-subir-una-imagen-con-ajax.html     //////////////
///////                                    Docuementacion de subir img                      //////////////
///////                                                                                     //////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

// Retorna :
// .............................    Json 'Res'
    
        
        

        $bit= ($_POST["pBit"]);

        
        
        $link = mysqli_connect('107.180.58.44', 'jm57592253', 'Jomialfa0605')or die('No se pudo conectar: ' . mysql_error());  
        $nombreConexion=mysqli_select_db($link,'seedAdmin') or die('No se pudo seleccionar la base de datos');
        $result = mysqli_query($link, 'call Sp_SaveBlog('.$_POST["pId"].",'".$_POST["pNombreAutor"]."','".$_POST["pIMG"]."','".$_POST["pExt"]."','".$_POST["pCuerpo"]."','".$_POST["pFecha"]."','".$_POST["pTitulo"]."',".$bit.')')
        or die( 'Error base de datos');


echo(json_encode($respuesta));



?>    