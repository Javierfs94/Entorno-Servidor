<?php
/*
* Titulo: Ejercicio 1
* Descripcion: Crear una aplicación que muestre las series favoritas de un usuario. El usuario añadirá sus series favoritas mediante un formulario
* Autor: Francisco Javier Frías Serrano
*/

include "limpiarDatos.php";
include "Serie.php";

session_start();

const PLATAFORMAS = array("Netflix", "Amazon Prime", "Disney+", "HBO");
const IDIOMAS = array("español", "inglés", "francés");
$titulo = "";
$temporadas="";
$idiomas="";
$lanzamiento="";

function imprimirPlataformas(){
  echo "Plataforma: <select name='plataformas'>";
  for ($i=0; $i < sizeof(PLATAFORMAS); $i++) { 
    echo ($i==0) ?
    "<option value=".PLATAFORMAS[$i]." selected>".PLATAFORMAS[$i]."</option>" :
    "<option value=".PLATAFORMAS[$i].">".PLATAFORMAS[$i]."</option>";
  }
  echo "</select>";
}

function imprimirIdiomas(){
  echo "Idiomas: ";
  for ($i=0; $i < sizeof(IDIOMAS); $i++) { 
    echo ($i==0) ?
    IDIOMAS[$i]."<input type='checkbox' name='idiomas[]' value=".IDIOMAS[$i]." checked>" :
    IDIOMAS[$i]."<input type='checkbox' name='idiomas[]' value=".IDIOMAS[$i].">" ;
  }
}

function formRegistro(){
  echo "<h2>Introduzca una serie</h2>";
  echo "<form action=".$_SERVER['PHP_SELF']." method='post'>";
  echo "Titulo: <input type='text' name='titulo' value=''>
  <br>";
  imprimirPlataformas();
  echo "<br>";
  echo "Temporadas: <input type='number' name='temporadas' min='1' value='1'><br>";
  echo "Lanzamiento: <input type='date' name='lanzamiento' min='1' value='1'><br>";
  imprimirIdiomas();
  echo "<br><br>";
  echo "<input type='submit' name='enviar'>";
  echo "</form>";
}

function mostrarSeries(){
  echo "<h2>Mis series</h2>";
  echo "<table border=\"1\">";
  echo "<tr>
  <th>Nombre</th>
  <th>Plataforma</th>
  <th>Temporadas</th>
  <th>Idiomas</th>
  <th>Lanzamiento</th>
  </tr>";
  foreach ($_SESSION['series'] as $indice => $serie) {
    echo "<tr>";
    echo "<td>".$serie->getTitulo()."</td>
    <td>".$serie->getPlataforma()."</td>
    <td>".$serie->getTemporadas()."</td>";
    echo "<td>";
    foreach ($serie->getIdiomas() as $idiomas => $idioma) {
      echo $idioma."<br>";
    }
    echo "</td>";
    echo "<td>".$serie->getLanzamiento()."</td>";
    echo "</tr>";
}
echo "</table>";
}

if (!isset($_SESSION['series'])){ 
  $_SESSION['series'] = array();
}

if (!isset($_POST['enviar'])) {
  formRegistro();
}else {
  formRegistro();
  if (isset($_POST["titulo"]) && isset($_POST["plataformas"]) && isset($_POST["temporadas"]) && isset($_POST["idiomas"]) && isset($_POST["lanzamiento"])) {
    $serie = new Serie($_POST["titulo"], $_POST["plataformas"], $_POST["temporadas"], $_POST["idiomas"], $_POST["lanzamiento"]);
    array_push($_SESSION['series'], $serie);
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Series favoritas</title>
</head>

<body>

<div>
    <h2>Series favoritas</h2>
    <p>Crear una aplicación que muestre las series favoritas de un usuario. El usuario añadirá sus series favoritas mediante un formulario</p>
</div>

<?php
if (!empty($_SESSION['series'])){ 
  mostrarSeries();
}
?>

<br>
<button><a href="logout.php">Cerrar sesion</a></button>
<br>

<?php
    echo "<br/><a href='../../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
    <a href="../../../"><button>Volver</button></a>

</body>

</html>