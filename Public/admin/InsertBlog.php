
<?php
//Metodo post campos :
// .............................    'pId'           ==> int  ------ Si es insert se pone 0
// .............................    'pNombreAutor'  ==> varchar(200)
// .............................    'pCuerpo'       ==> varchar(10000)
// .............................    'pFecha'        ==> date
// .............................    'pTitulo'       ==> varchar(200)
// .............................    'file'          ==> file
// .............................    'pBit'           ==> ingles


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
        switch ($tipo) {
            case 'image/jpg':
                $tipo=".jpg";
                break;
            case 'image/jpeg':
                $tipo=".jpeg";
                break;
            case 'image/png':
                $tipo=".png";
                break;
            default:
                $tipo=".gif";
                break;
        }
        $nombre = date('ljS\ofFYhisA');
        $src = $pPathImg.$nombre.$tipo;
        echo($tipo);
        move_uploaded_file($ruta_provisional, $src);
        
        if($_POST["pBit"]=='on'){
            $bit = 1;
        }
        else{
            $bit = 0;
        }
        
        
        
        $link = mysqli_connect('107.180.58.44', 'jm57592253', 'Jomialfa0605')or die('No se pudo conectar: ');  
        $nombreConexion=mysqli_select_db($link,'seedAdmin') or die('No se pudo seleccionar la base de datos');  
        $result = mysqli_query($link, 'call Sp_SaveBlog(0,"'.$_POST["pNombreAutor"].'","'.$src.'","'.$tipo.'","'.$_POST["pCuerpo"].'","'.$_POST["pFecha"].'","'.$_POST["pTitulo"].'",'.$bit.')' )
        or die("Error base de datos");
        
        
    }
    echo(json_encode($respuesta));
}



?>    