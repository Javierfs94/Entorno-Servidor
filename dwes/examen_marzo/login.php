<?php
    function login($user, $passwd) {
        require_once('app/Usuario.php');
        $usuario = New Usuario();
        $usuario-> getUser($user, $passwd);
        return $usuario->login;
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

        //Si están vacios los campos devuelve este mensaje
        if (empty($user) or empty($passwd)) {
            $error = "<font color=\"red\"> Rellena todos los campos.</font>";
        } else {

            //Si el usuario marca recordar la cookie se almacena
            if(isset($_POST['recordar'])){
                if($_POST["recordar"] == 'checked'){
                    setcookie("user", $user, time()+(86400 * 30));
                    setcookie("passwd", $passwd, time()+(86400 * 30));
                    setcookie("recordar", "true", time()+(86400 * 30));
                }
                //Si no se elimina si ya existe
                else {
                    setcookie("user", "", time()-3600);
                    setcookie("passwd", "", time()-3600);
                    setcookie("recordar", "false", time()+(86400 * 30));
                }
            }

            //Devuelve true si el usuario es correcto y crea sesión y si no devuelve false y muestra mensaje error.
            if (login($user, $passwd)) {
                $_SESSION["logged"] = true;
                $_SESSION["user"] = $user;
                header("Location: index.php");
            } else {
                $error = "<font color=\"red\"> Usuario o contraseña incorrectos.</font>";
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
    <p><a href="register.php">¿No eres un miembro? Registrate</a></p>
    <form method="POST" action="login.php">
        <label>Usuario: <input type="text" name="user" value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?>"> </label><br>
        <label>Contraseña: <input type="password" name="passwd" value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['passwd'];} ?>"> </label><br>
        <label>Recordar contraseña <input type="checkbox" name="recordar" value="checked" <?php if(isset($_COOKIE['recordar'])){if($_COOKIE['recordar'] == 'true'){echo "checked";}} ?>> </label><br>
        <input type="hidden" name="enviado" value="enviado">
        <input type="submit" value="Login">
        <br> <?php echo $error; ?>
    </form>
    <?php include "include/footer.php"; ?>
</body>
</html>