<?php
    require_once('Usuario.php');
    
    if(isset($_POST['validar'])){
        if($_POST['user']!='' && $_POST['password'] != '' && $_POST['perfil'] != ''){
            $usuario = new Usuario();
            $usuario->set(array($_POST['user'],$_POST['password'], $_POST['perfil']));
            echo $usuario->mensaje;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Rafael Lopez Cruz">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba DB</title>
</head>
<body>
    <form action="index.php" method="POST">
        Usuario: <input name="user" type="text"><br>
        Contraseña: <input name="password" type="text"><br>
        Perfil: <input name="perfil" type="text"><br>
        <input type="hidden" name="validar">
        <input type="submit" value="Crear usuario">
    </form>
</body>
</html>