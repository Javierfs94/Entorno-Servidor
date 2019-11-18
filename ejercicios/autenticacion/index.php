<?php
    include("./config/parametros.php");

    function login($user, $password) {
        return ($user == "cristiano" and $password == "ronaldo");
    }

    session_start();

    if (!isset($_SESSION["logged"])) {
        $_SESSION["logged"] = false;
        $_SESSION["user"] = "invitado";
    }

    $usuario = "";
    $procesar_formulario = true;

    if (isset($_POST["login"])) {
        $user = $_POST["user"];
        $password = $_POST["password"];
        if (login($user, $password)) {
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $user;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title><?php TITULO ?></title>
</head>
<body>
    <?php
    include("includes/cabecera.php");
    ?>
<table><tr><td></td><td><h1><php? TITULO ?></h1></td></tr></table><hr/><br/>
    <?php
        if ($_SESSION["logged"]) {
            echo "Ha iniciado sesión como ".$_SESSION["user"].".<br/><br/>";
            echo "<a href=\"privado.php\">Área privada</a><br/><br/>";
            echo "<a href=\"logout.php\">Cerrar sesión</a>";
        } else {
            echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">";
            echo "<label for=\"user\">Usuario: </label><input type=\"text\" name=\"user\"><br/><br/>";
            echo "<label for=\"password\">Contraseña: </label><input type=\"text\" name=\"password\"><br/><br/>";
            echo "<input type=\"submit\" name=\"login\" value=\"Iniciar sesión\">";
            echo "</form>";
        }

        echo "<br/><a href='../includes/verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
        ?>
        <a href="../../"><button>Volver</button></a>
           
    <?php       
    include("includes/footer.php");
    ?>
</body>
</html>
