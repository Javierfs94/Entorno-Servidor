<?php
    /**
    *Almacenar en una cookie user y psw
    *@author Rafael Miguel Cruz Álvarez
    */

    if(!isset($_POST['enviar'])){
        header('Location: formulario.php');
    }

    $usuario=error($_POST['user']);
    $psw=error($_POST['psw']);
    $lprocesaFormulario = true;

    if(empty($usuario)){
        $lprocesaFormulario = false;
    }

    if(empty($psw)){
        $lprocesaFormulario = false;
    }

    if (!$lprocesaFormulario){
        header("Location: formulario.php");
    }

    /**
     * Función de limpiar errores
     */
    function error($limpiar){
        $error = trim($limpiar);
        $error = stripslashes($limpiar);
        $error =  htmlspecialchars($limpiar);
        return $error;
    }

    if (isset($_POST['recordar'])){
        if($_POST['recordar']==true){
            setCookie('user',$usuario,time()+3600);
            setCookie('psw',$psw,time()+3600);
        }
    }
    

    $autentificado = false;
    if(($usuario == 'messi') and ($psw=='ronaldo')){
        $autentificado = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookies</title>
</head>
<body>
    <?php
        if ($autentificado){
            echo "Ok, estas conectado";
        }
        else{
            echo "Error de autenticación";
        }
        echo "<br/><a href="."../../verCodigo.php?src=".str_replace("&bsol;","",_FILE_).">Ver Codigo</a><br/>";

    ?>
</body>
</html>