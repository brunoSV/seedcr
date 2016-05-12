
<?php
//Metodo post campos :
// .............................    'pId'           ==> int  ------ Si es insert se pone 0
// .............................    'pNombreAutor'  ==> varchar(200)
// .............................    'pCuerpo'       ==> varchar(10000)
// .............................    'pFecha'        ==> date
// .............................    'pTitulo'       ==> varchar(200)
// .............................    'file'          ==> file


//////////////////////////////////////////////////////////////////////////////////////////////////////////
///////                                                                                     //////////////
///////   http://jquery-manual.blogspot.com/2014/05/como-subir-una-imagen-con-ajax.html     //////////////
///////                                    Docuementacion de subir img                      //////////////
///////                                                                                     //////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////

// Retorna :
// .............................    Json 'Res'
    
   



if (isset($_FILES["file"]))
{
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $pPathImg = "ImgUpload/";
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
        $respuesta["Res"]= "Error, el archivo no es una imagen"; 
    }
    
    else
    {
        $src = $pPathImg.$nombre;
        echo($src);
        move_uploaded_file($ruta_provisional, $src);
        
        
        
        $link = mysqli_connect('107.180.58.44', 'jm57592253', 'Jomialfa0605')or die('No se pudo conectar: ');  
        $nombreConexion=mysqli_select_db($link,'seedAdmin') or die('No se pudo seleccionar la base de datos');
        $result = mysqli_query($link, 'call Sp_SaveBlog(0,"'.$_POST["pNombreAutor"].'","'.$src.'","'.$tipo.'","'.$_POST["pCuerpo"].'","'.$_POST["pFecha"].'","'.$_POST["pTitulo"].'",'.'1'.')' )
        or die("Error base de datos");
        
        
    }
}





?>    