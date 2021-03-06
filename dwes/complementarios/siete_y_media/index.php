<?php
/*
* Titulo: Juego de Las Siete Y Media
* Descripcion: 
* Implementar el juego de las siete y media.
* Trabaja con objetos.  Haz un pequeño diagrama de clases.
* 
* Autor: Francisco Javier Frías Serrano
*/

include "./funciones.php";
include "./class/Carta.php";
session_start();

$_SESSION["partida"] = true;

if (!isset($_SESSION['baraja'])){
  $_SESSION['baraja'] = array();
  $_SESSION["jugador"] = array();
  for ($i=0; $i < 4; $i++) {
    for ($j=1; $j < 11; $j++) { 
      array_push($_SESSION['baraja'], new Carta($j, $i));
    }
  }
  shuffle($_SESSION['baraja']);    
}


if (isset($_POST["pedir"])) {
  sacarCartaJugador();
}

if (!isset($_SESSION["banca"])) {
  $_SESSION["banca"] = array();
  generarManoBanca();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Siete y Media</title>
</head>

<body>

<div>
<?php
echo "<p>Mano JUGADOR:</p>";
for ($i=0; $i < sizeof($_SESSION["jugador"]); $i++) { 
  echo $_SESSION["jugador"][$i]->getImagen();
}

echo "<p>Puntos del jugador: ".getPuntos($_SESSION["jugador"])."</p>";

if (isset($_POST["plantarse"])) {
  $_SESSION["partida"] = false;
  echo juego();
  
echo "<p>Mano BANCA</p>";
for ($i=0; $i < sizeof($_SESSION["banca"]); $i++) { 
  echo $_SESSION["banca"][$i]->getImagen();
}

echo "<p>La banca tiene ".getPuntos($_SESSION["banca"])." puntos \n y el jugador tiene ".getPuntos($_SESSION["jugador"])." puntos</p>";
}

if ($_SESSION["partida"]) {
  echo "<h2>¿Quieres sacar carta?</h2>
  <form action='index.php' method='post'>
    <input type='submit' name='pedir' value='Sacar carta' >
    <input type='submit' name='plantarse' value='Plantarse carta' >
  </form>";
}else {
  echo "<h2>¿Quieres sacar carta?</h2>
  <form action='index.php' method='post'>
    <input type='submit' name='pedir' value='Sacar carta' disabled>
    <input type='submit' name='plantarse' value='Plantarse carta' disabled>
  </form>";
}

?>

<p><button><a href="reiniciarBaraja.php">Reiniciar partida</a></button></p>

<?php
  // Boton para ir al repositorio del ejercicio
  echo "<br/><a href='https://github.com/Javierfs94/Entorno-Servidor/tree/master/dwes/complementarios/siete_y_media'><button>Repositorio</button></a>";    
?>

</div>

</body>

</html>