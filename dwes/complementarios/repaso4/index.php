<?php
/*
* Titulo: Ejercicios de repaso 2
* Descripcion: 
* 1.Imprime la suma de elementos de un vector A de subíndices 1..n con una función recursiva.
* 2.Crear una clase que implemente la estructura de datos cola.
* 3.Utilizando las estructuras creadas, crea un programa que determine si una expresión con paréntesis está equilibrada.
* 
* Autor: Francisco Javier Frías Serrano
*/
?>

<?php
  include "./includes/functions.php";
  include "./class/Cola.php";
  include "./class/Pila.php";
  session_start();

if (!isset($_SESSION["vector"])) {
  $_SESSION["vector"] = array();
}

if (!isset($_SESSION["cola"])) {
  $_SESSION["cola"] = array();
}

if (isset($_POST["annadir"])) {
  if (isset($_POST["cola"]) && $_POST["cola"] != "") {
    $cola = new Cola($_SESSION["cola"]);
    $cola->push($_POST["cola"]);
    $_SESSION["cola"] = $cola->getElementos();
  }
}

if (isset($_POST["sacar"])) {
    $cola = new Cola($_SESSION["cola"]);
    $cola->pop();
    $_SESSION["cola"] = $cola->getElementos();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicios básicos semana 4</title>
</head>

<body>

<?php

echo "<h2>Ejercicio 1 Suma de elementos de un vector A</h2>";
echo "<form action='index.php' method='post'>
<p>Número <input type='text' name='numero'></p>
<input type='submit' name='annadirElemento' value='Añadir Elemento al Vector'>
<input type='submit' name='sumarElementos' value='Mostrar suma'>
</form>";


if (isset($_POST["annadirElemento"])) {
  array_push($_SESSION["vector"], $_POST["numero"]);
}

if (isset($_SESSION["vector"])) {
  echo "<p>";
  foreach ($_SESSION["vector"] as $key => $valor) {
    echo $valor." ";
  }
  echo "</p>";
}

if (isset($_POST["sumarElementos"])) {
  echo "<p>La suma de los elementos del vector es " . sumaVector($_SESSION["vector"]) . "</p>";
}

echo "<p><button><a href='logout.php'>Limpiar</a></button></p>";

echo "<hr>";

echo "<h2>Ejercicio 2 Cola</h2>";
echo "<form action='index.php' method='post'>
<p>Añadir a la cola <input type='text' name='cola'></p>
<input type='submit' name='annadir' value='Añadir a la cola'>
<input type='submit' name='sacar' value='Sacar de la cola'>
</form>";

if (isset($cola)){
  echo $cola->mostrarCola();
}

echo "<p><button><a href='logout.php'>Limpiar</a></button></p>";

echo "<hr>";

echo "<h2>Ejercicio 3 Determinar si una expresión con paréntesis está equilibrada</h2>";


$estructura = "(1+2)*((1-2))))";

echo "<form action='index.php' method='post'>
<p>Expresión a comprobar equilibrio <input type='text' name='expresionEquilibrada'></p>
<input type='submit' name='comprobarExpresionEquilibrada' value='Analizar estructura'>
</form>";

if (isset($_POST["comprobarExpresionEquilibrada"])) {
  if (comprobarEquilibrado($_POST["expresionEquilibrada"])) {
    echo "<p>Está equilibrado</p>";
  }else {
    echo "<p>No está equilibrado</p>";
  }
}

?>

<?php
  // Boton para ir al repositorio del ejercicio
    echo "<br/><a href='https://github.com/Javierfs94/Entorno-Servidor/tree/master/dwes/complementarios/repaso4'><button>Repositorio</button></a>";    
?>

</body>

</html>