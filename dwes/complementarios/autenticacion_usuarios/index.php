<?php
/*
* Titulo: Autenticación de usuarios
* Descripcion: 
* Escenario de funcionamiento.
* El usuario administrador cuyas credenciales serán 'admin', 'admin' será responsable de registrar a los usuarios , de los que se almacena simplemente el nombre de usuario y su contraseña.
* Crea en el sistema un script privado.php que muestre el mensaje: "La cara oculta de la luna". Sólo los usuarios registrados podrán acceder a este script.
* Al no disponer de bases de datos, deberás trabajar con ficheros que almacenen las credenciales de los usuarios. 
* Utiliza un array para que el administrador almacene las credenciales y al terminar la sesión se guarden en un archivo.. Una matriz cuadrada A se dice que es simétrica si A(i,j) = A(j,i) para todo i,j dentro de los límites de la matriz. Escribe una función que determine si una matriz es cuadrada y un programa que permita introducir el tamaño de la matriz y sus elementos en un formulario.
* 
* Autor: Francisco Javier Frías Serrano
*/
?>

<?php
  // Includes
  // include "";
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




if(isset($_POST["username"]) &&  isset($_POST["password"])){
  $_SESSION["username"] = $_POST["username"];
  $_SESSION["password"] = $_POST["password"];

  $fp = fopen("usuarios.txt", "r");
  while ($linea = fgets($fp)) {
    $lineaSeparada = preg_split('/\s+/', $linea);
    if ($_POST["username"] == $lineaSeparada[0] && $_POST["password"] == $lineaSeparada[1]) {
      header('Location: privado.php'); 
    }
  }
  fclose($fp);

  if ($_POST["username"] == "admin" && $_POST["password"] == "admin") {
      header('Location: admin.php'); 
  }
}

if (isset($_POST["logout"])) {
  header("Location: logout.php");
}

?>


<form method="post" action="index.php" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>

<form method="post" action="admin.php" name="signin-form">
    <button type="submit" name="logout" value="logout">Log Out</button>
</form>


<?php
  // Boton para ir al repositorio del ejercicio
    echo "<br/><a href=''><button>Repositorio</button></a>";    
?>

</body>

</html>