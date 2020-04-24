<?php
/*
* Titulo: Ejercicios de repaso 2
* Descripcion: 
* 1. Crea una función para pasar un número en notación romana a notación arábiga. Prueba la función con los siguientes valores:
* LXXXVI (86), CCCXIX (319), MCCLIV (1254)
* M:1000, D:500, C:100, L:50, X:10, V:5, I:1
* 2. Un número perfecto es un entero positivo, que es igual a la suma de todos los enteros positivos que son divisores del número. El primer número perfecto es 6, ya que los divisores de 6 son 1, 2 y 3. Escribe un script que muestre los tres primeros números perfectos y su suma.
* 3. Una matriz cuadrada A se dice que es simétrica si A(i,j) = A(j,i) para todo i,j dentro de los límites de la matriz. Escribe una función que determine si una matriz es cuadrada y un programa que permita introducir el tamaño de la matriz y sus elementos en un formulario.
* 
* Autor: Francisco Javier Frías Serrano
*/
?>

<?php
  // Includes
  include "funciones.php";
  include "./class/numeroRomano.php";
  session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicios básicos semana 2</title>
</head>

<body>

<?php

echo "<h2>Ejercicio 1</h2><p>Números romanos => M:1000, D:500, C:100, L:50, X:10, V:5, I:1</p>";
echo "<form action='index.php' method='post'>
<p>El número en notacion romana: <input type='text' name='numeroRomano'></p>
<input type='submit' name='enviar' value='Enviar'>
</form>";

if (isset($_POST["enviar"])){
  if (isset($_POST["numeroRomano"]) && ($_POST["numeroRomano"] != "")){   
      $numeroRomano = new NumeroRomano($_POST["numeroRomano"]);
  }
}
if (isset($_POST["numeroRomano"]) && ($_POST["numeroRomano"] != "") && $numeroRomano->conversor() != 0){
  echo "<br>";
  echo $numeroRomano->conversor();
}elseif(isset($_POST["numeroRomano"]) && ($_POST["numeroRomano"] != "")){
  echo "<p style='color: red;'>Introduzca solo números romanos</p>";
}

echo "<hr>";

echo "<h2>Ejercicio 2</h2>";
tresPrimerosPerfect();

echo "<hr>";

echo "<h2>Ejercicio 3</h2>";
echo "
  <form action='index.php' method='post'>
    Tamaño de la matriz: <input type='number' name='tamanno' > <br>
    <input type='submit' name='enviar' value='Enviar' >
  </form>";


if (isset($_POST["tamanno"])) {
  echo "<form action='index.php' method='post'>
  <p>Introduzca valores para la matriz</p>
  ";
  for ($i=0; $i < $_POST["tamanno"]; $i++) { 
    echo "<br>";
    for ($j=0; $j < $_POST["tamanno"]; $j++) { 
      echo "<input type='number' name='valores[$i][$j]' >";
    }
  }
  echo "<p><input type='submit' name='enviar' value='Enviar' ></p>
  </form>";
}

if (isset($_POST["valores"])) {
  $comprobacion = true;
  for ($i=0; $i < count($_POST["valores"]); $i++) { 
    for ($j=0; $j < count($_POST["valores"]); $j++) {
      if ($_POST["valores"][$i][$j] != $_POST["valores"][$j][$i]) {
        $comprobacion = false;
      } 
    }
  }

  if ($comprobacion) {
    echo "<p>Es simétrica</p>";
  }else {
    echo "<p>No es simétrica</p>";
  }
}

?>


<?php
  // Boton para ir al repositorio del ejercicio
    echo "<br/><a href='https://github.com/Javierfs94/Entorno-Servidor/tree/master/dwes/complementarios/repaso2'><button>Repositorio</button></a>";    
?>

</body>

</html>