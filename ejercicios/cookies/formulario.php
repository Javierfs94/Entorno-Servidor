<?php
$usuarioValorInicial = "";
$pswValorInicial = "";

if (isset($_COOKIE['user'])){
    $usuarioValorInicial = $_COOKIE['user'];
}
if (isset($_COOKIE['psw'])){
    $pswValorInicial = $_COOKIE['psw'];
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
        echo "<form action=\"procesarFormulario.php\" method=\"POST\">";
        echo "Usuario: <input type=\"text\" name=\"user\" value=".$usuarioValorInicial." ></br>";
        echo "Contraseña: <input type=\"password\" name=\"psw\" value=".$pswValorInicial." ></br>";
        echo "Recordar Datos: <input type=\"checkbox\" name=\"recordar\" ></br>";


        echo "<a href=\"procesarFormulario.php\"><input type=\"submit\" name=\"enviar\" ></a>";
        echo "<br/><a href="."../../verCodigo.php?src=".str_replace("&bsol;","",_FILE_).">Ver Codigo</a><br/>";
    ?>
</body>
</html>