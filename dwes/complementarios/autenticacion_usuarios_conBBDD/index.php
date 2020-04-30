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
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "auten_users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION["perfil"])) {
  $_SESSION["perfil"] = "invitado";
}

if(isset($_POST["username"]) &&  isset($_POST["password"])){
  $result = $conn->query("SELECT username, pass FROM usuarios WHERE username='".$_POST["username"]."' AND pass='".$_POST["password"]."'");
  if(mysqli_num_rows($result)>=1){
   $_SESSION["perfil"] = "registrado";
   header('Location: privado.php');
   $result->close();
  }
  else{
    echo "<p>El usuario no existe</p>";
  }

  if ($_POST["username"] == "admin" && $_POST["password"] == "admin") {
    $_SESSION["perfil"] = "admin";
    header('Location: index.php'); 
  }

}

if(isset($_POST["newusername"]) &&  isset($_POST["newpassword"])){

  $sql = "INSERT INTO usuarios (username, pass) VALUES ('".$_POST["newusername"] ."','".$_POST["newpassword"]."')";

  $result = $conn->query("SELECT username FROM usuarios WHERE username='".$_POST["newusername"]."'");

  if(mysqli_num_rows($result)>=1){
    echo "<p>El usuario ya existe</p>";
  }else{
    if ($conn->query($sql) === TRUE) {
      echo "<p>Usuario creado satisfacctoriamente</p>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  $conn->close();

}

if (isset($_POST["logout"])) {
  header("Location: logout.php");
}

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

if (isset($_SESSION["perfil"]) && $_SESSION["perfil"] == "admin") {
  echo "<form method='post' action='index.php' name='signin-form'>
  <div class='form-element'>
      <label>New Username</label>
      <input type='text' name='newusername' pattern='[a-zA-Z0-9]+' required />
  </div>
  <div class='form-element'>
      <label>New Password</label>
      <input type='password' name='newpassword' required />
  </div>
  <button type='submit' name='login' value='login'>Create User</button>
</form>

<form method='post' action='index.php' name='signin-form'>
  <button type='submit' name='logout' value='logout'>Log Out</button>
</form>";



}else {
  echo "<form method='post' action='index.php' name='signin-form'>
  <div class='form-element'>
      <label>Username</label>
      <input type='text' name='username' pattern='[a-zA-Z0-9]+' required />
  </div>
  <div class='form-element'>
      <label>Password</label>
      <input type='password' name='password' required />
  </div>
  <button type='submit' name='login' value='login'>Log In</button>
</form>";
 
}
?>

<?php
  // Boton para ir al repositorio del ejercicio
    echo "<br/><a href='https://github.com/Javierfs94/Entorno-Servidor/tree/master/dwes/complementarios/autenticacion_usuarios_conBBDD'><button>Repositorio</button></a>";    
?>

</body>

</html>