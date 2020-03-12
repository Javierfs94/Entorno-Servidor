<?php
    function register($user, $passwd, $email) {
        require_once('app/Usuario.php');
        $usuario = New Usuario();
        $usuario-> setUser(array($user, $passwd, $email));
        return $usuario->register;
    }

    session_start();
    if (!isset($_SESSION["logged"])) {
        $_SESSION["logged"] = false;
        $_SESSION["user"] = "invitado";
    }

    $error = "";

    if (isset($_POST["enviado"])) {
        $user = $_POST["user"];
        $passwd = $_POST["passwd"];
        $passwd2 = $_POST["passwd2"];
        $email = $_POST['email'];
        if (empty($user) or empty($passwd) or empty($email)) {
            $error = "<font color=\"red\"> Rellena todos los campos.</font>";
        } 
        elseif ($passwd !== $passwd) {
            $error = "<font color=\"red\"> ¡Las contraseñas son diferentes!</font>";
        }
        else {
            if (register($user, $passwd, $email)) {
                $_SESSION["logged"] = true;
                $_SESSION["user"] = $user;
                $error = "<font color=\"green\">Usuario registrado correctamente.</font><br><a href='index.php'>Ir a tú perfil</a>";

            } else {
                $error = "<font color=\"red\">¡Ya existe un usuario con ese nombre!</font>";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Francisco Javier Frías Serrano">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Examen DWES Febrero - Francisco Javier Frías Serrano</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include "include/cabecera.php"; ?>
    <form method="POST" action="register.php">
        <label>Correo: <input type="email" name="email"> </label><br>
        <label>Usuario: <input type="text" name="user"> </label><br>
        <label>Contraseña: <input type="password" name="passwd"> </label><br>
        <label>Confirma Contraseña: <input type="password" name="passwd2"> </label><br>
        <input type="hidden" name="enviado" value="enviado">
        <input type="submit" value="Registrar">
        <br> <?php echo $error; ?>
    </form>
    <?php include "include/footer.php"; ?>
</body>
</html>