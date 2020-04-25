<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Autenticación de usuarios</title>
</head>

<body>

<?php

if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
  header("Location: index.php");
}else {
  echo "<h2>La cara oculta de la luna</h2>";
}

if (isset($_POST["logout"])) {
  header("Location: logout.php");
}
?>

<form method="post" action="admin.php" name="signin-form">
    <button type="submit" name="logout" value="logout">Log Out</button>
</form>


<?php
  // Boton para ir al repositorio del ejercicio
  echo "<br/><a href='https://github.com/Javierfs94/Entorno-Servidor/tree/master/dwes/complementarios/autenticacion_usuarios'><button>Repositorio</button></a>";    
?>

</body>

</html>

