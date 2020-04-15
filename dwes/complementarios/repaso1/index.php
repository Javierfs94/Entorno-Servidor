<?php
/*
* Titulo: Ejercicios de repaso
* Descripcion: 
* 1. Crear una clase dni. Utiliza un método para su correcta validación.
* 2. Escribe una función que determine si un número es primo.
* 3. Untilizando la funcion anterior crea un array que almacene los primeros 5 números primos
* 
* Autor: Francisco Javier Frías Serrano
*/
?>

<?php
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


<form action="index.php" method="post">
  <p>DNI: <input type="text" name="dni"><br></p>
  <p>Número: <input type="number" name="numero"><br></p>
  <input type="submit" name="enviar" value="Enviar">
</form>
<br>

<?php

if (isset($_POST["enviar"])){
  if (isset($_POST["dni"]) && ($_POST["dni"] != "")){
      $dni = new DNI($_POST["dni"]);
      echo $dni->getMensaje()."<br>";
  }

  if (isset($_POST["numero"]) && ($_POST["numero"] != "")){
    if (comprobarSiEsPrimo($_POST["numero"])) {
        echo $_POST["numero"]." es primo";
    }else{
        echo $_POST["numero"]." no es primo";
      }
    }
}

cincoPrimerosPrimos();

?>


<?php
    echo "<br/><a href='../../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
    <a href="../../../"><button>Volver</button></a>

</body>

</html>