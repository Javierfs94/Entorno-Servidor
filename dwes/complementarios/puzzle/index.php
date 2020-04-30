<?php
/*
* Titulo: Puzzle Infantil
* Descripcion: 
* Escenario de funcionamiento.
* Se debe crear una aplicación que permita resolver puzzles infantiles de tres piezas. Se adjunta fichas de ejemplo, pero es necesario que personalices las fichas del rompecabezas.
* 
* Aplica criterios de usabilidad en el diseño de la aplicación intentando conseguir la mejor experiencia de usuario. Utiliza un array para que el administrador almacene las credenciales y al terminar la sesión se guarden en un archivo.. Una matriz cuadrada A se dice que es simétrica si A(i,j) = A(j,i) para todo i,j dentro de los límites de la matriz. Escribe una función que determine si una matriz es cuadrada y un programa que permita introducir el tamaño de la matriz y sus elementos en un formulario.
* 
* Autor: Francisco Javier Frías Serrano
*/
?>

<?php
session_start();
include "./class/Ficha.php";

$fichasMostradas = array();

if (!isset($_SESSION["fichasMostradas"])) {
  $_SESSION["fichasMostradas"] = array();
  }
  for ($i=1; $i < 4; $i++) {
      $numeroPuzle = rand(1,5);
      $ficha = array( $numeroPuzle,$i, "./img/".$numeroPuzle.$i.".jpg");
      array_push($_SESSION["fichasMostradas"], $ficha);
}


if (isset($_POST["cambiar1"])) {
  if ($_SESSION["fichasMostradas"][0][0] < 5) {
      $_SESSION["fichasMostradas"][0][0] = ($_SESSION["fichasMostradas"][0][0]+ 1);
  }else{
      $_SESSION["fichasMostradas"][0][0] = 1;
  }

  $_SESSION["fichasMostradas"][0][2]="./img/".$_SESSION["fichasMostradas"][0][0].$_SESSION["fichasMostradas"][0][1].".jpg";
}

if (isset($_POST["cambiar2"])) {
  if ($_SESSION["fichasMostradas"][1][0] < 5) {
      $_SESSION["fichasMostradas"][1][0] = ($_SESSION["fichasMostradas"][1][0]+ 1);
  }else{
      $_SESSION["fichasMostradas"][1][0] = 1;
  }

  $_SESSION["fichasMostradas"][1][2]="./img/".$_SESSION["fichasMostradas"][1][0].$_SESSION["fichasMostradas"][1][1].".jpg";

}

if (isset($_POST["cambiar3"])) {
  if ($_SESSION["fichasMostradas"][2][0] < 5) {
      $_SESSION["fichasMostradas"][2][0] = ($_SESSION["fichasMostradas"][2][0]+ 1);
  }else{
      $_SESSION["fichasMostradas"][2][0] = 1;
  }

  $_SESSION["fichasMostradas"][2][2]="./img/".$_SESSION["fichasMostradas"][2][0].$_SESSION["fichasMostradas"][2][1].".jpg";

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Puzzle Infantil</title>
</head>

<body>

<?php

if (isset($_SESSION["fichasMostradas"])) {
  foreach ($_SESSION["fichasMostradas"] as $key => $ficha) {
      array_push($fichasMostradas, new Ficha($ficha[0],$ficha[1],$ficha[2]));
  }
  if ($fichasMostradas[0] -> getPuzle() == $fichasMostradas[1] -> getPuzle() && $fichasMostradas[1] -> getPuzle() == $fichasMostradas[2] -> getPuzle()) {
      echo "<h1>Enhorabuena, has ganado</h1>";
      echo "<div style=\"width:1250px; display: inline-block;\"><div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"".$fichasMostradas[0] -> getImagen()."\" alt=\"Primera Ficha\">";
      echo "<form action=\"index.php\" method=\"post\">
      <input style=\"width:100%\" type=\"submit\" name=\"cambiar1\" value=\"Siguiente Ficha\" disabled>
      </form></div>";

      echo "<div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"".$fichasMostradas[1] -> getImagen()."\" alt=\"Segunda Ficha\">";
      echo "<form action=\"index.php\" method=\"post\">
      <input style=\"width:100%\" type=\"submit\" name=\"cambiar2\" value=\"Siguiente Ficha\" disabled>
      </form></div>"; 

      echo "<div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"".$fichasMostradas[2] -> getImagen()."\" alt=\"Tercera Ficha\">";
      echo "<form action=\"index.php\" method=\"post\">
      <input style=\"width:100%\" type=\"submit\" name=\"cambiar3\" value=\"Siguiente Ficha\" disabled>
      </form></div></div>";
      
  }else{
      echo "<div style=\"width:1250px; display: inline-block;\"><div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"".$fichasMostradas[0] -> getImagen()."\" alt=\"Primera Ficha\">";
      echo "<form action=\"index.php\" method=\"post\">
      <input style=\"width:100%\" type=\"submit\" name=\"cambiar1\" value=\"Siguiente Ficha\">
      </form></div>";

      echo "<div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"".$fichasMostradas[1] -> getImagen()."\" alt=\"Segunda Ficha\">";
      echo "<form action=\"index.php\" method=\"post\">
      <input style=\"width:100%\" type=\"submit\" name=\"cambiar2\" value=\"Siguiente Ficha\">
      </form></div>"; 

      echo "<div style=\"width:20%; margin:.1%; display: inline-block;\"><img src=\"".$fichasMostradas[2] -> getImagen()."\" alt=\"Tercera Ficha\">";
      echo "<form action=\"index.php\" method=\"post\">
      <input style=\"width:100%\" type=\"submit\" name=\"cambiar3\" value=\"Siguiente Ficha\">
      </form></div></div>";
      }
  }

echo "<br><a href='reset.php'><button>Reiniciar</button></a><br>";

?>

<?php
  // Boton para ir al repositorio del ejercicio
    echo "<br/><a href='https://github.com/Javierfs94/Entorno-Servidor/tree/master/dwes/complementarios/puzzle'><button>Repositorio</button></a>";    
?>

</body>

</html>