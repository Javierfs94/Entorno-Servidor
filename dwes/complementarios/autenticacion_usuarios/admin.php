<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Autenticación de usuarios (Admin)</title>
</head>

<body>

<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    header("Location: index.php");
}

if (!isset($_SESSION["usuarios"])) {
    $_SESSION["usuarios"] = array();
    $fp = fopen("usuarios.txt", "a+");
    while (!feof($fp)){
        $linea = fgets($fp);
        array_push($_SESSION["usuarios"], $linea);
    }
    fclose($fp);
}

if(isset($_POST["newusername"]) &&  isset($_POST["newpassword"])){
    $cadena = $_POST["newusername"]." ". $_POST["newpassword"];
    array_push($_SESSION["usuarios"], $cadena);
}

if (isset($_POST["logout"])) {
    $myfile = fopen("usuarios.txt", "a+") or die("Unable to open file!");
    $txt = "";
    foreach ($_SESSION["usuarios"] as $key => $usuario) {
        $txt = $txt .  $usuario."\n";
    }
    fwrite($myfile, $txt);
    fclose($myfile);
    header("Location: logout.php");
}

?>


<form method="post" action="admin.php" name="signin-form">
    <div class="form-element">
        <label>New Username</label>
        <input type="text" name="newusername" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>New Password</label>
        <input type="password" name="newpassword" required />
    </div>
    <button type="submit" name="login" value="login">Create User</button>
</form>

<form method="post" action="admin.php" name="signin-form">
    <button type="submit" name="logout" value="logout">Log Out</button>
</form>


<?php
  // Boton para ir al repositorio del ejercicio
  echo "<br/><a href='https://github.com/Javierfs94/Entorno-Servidor/tree/master/dwes/complementarios/autenticacion_usuarios'><button>Repositorio</button></a>";    
?>

</body>

</html>