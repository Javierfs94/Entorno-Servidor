<?php
/*
* Titulo: Ejercicios de repaso 1
* Descripcion: 
* 1. Crear una clase dni. Utiliza un método para su correcta validación.
* 2. Escribe una función que determine si un número es primo.
* 3. Untilizando la funcion anterior crea un array que almacene los primeros 5 números primos
* 
* Autor: Francisco Javier Frías Serrano
*/
?>

<?php
  // Includes
  include "DNI.php";
  include "funciones.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicios básicos semana 1</title>
</head>

<body>

<div>
    <h2>Ejercicios de repaso de la semana 1</h2>
    <p>1. Crear una clase dni. Utiliza un método para su correcta validación.</p>
    <p>2. Escribe una función que determine si un número es primo.</p>
    <p>3. Untilizando la funcion anterior crea un array que almacene los primeros 5 números primos</p>
</div>

<!-- Formulario -->

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <p>DNI: <input type="text" name="dni"><br></p>
  <p>Número: <input type="number" name="numero"><br></p>
  <input type="submit" name="enviar" value="Enviar">
</form>
<br>

<?php

if (isset($_POST["enviar"])){
  // Comprobación de si se ha introducido un DNI
  if (isset($_POST["dni"]) && ($_POST["dni"] != "")){
      $dni = new DNI($_POST["dni"]);
      echo "<p>".$dni->getMensaje()."</p>";
  }

  // Comprobación de si se ha introducido un número primo
  if (isset($_POST["numero"]) && ($_POST["numero"] != "")){
    if (esPrimo($_POST["numero"])) {
        echo "<p>".$_POST["numero"]." es primo</p>";
    }else{
        echo "<p>".$_POST["numero"]." no es primo</p>";
      }
    }
}

//Mostrar los 5 primeros números primos
cincoPrimerosPrimos();
?>

<?php
  // Boton para ir al repositorio del ejercicio
    echo "<br/><a href='https://github.com/Javierfs94/Entorno-Servidor/tree/master/dwes/complementarios/repaso1'><button>Repositorio</button></a>";    
?>

</body>

</html>