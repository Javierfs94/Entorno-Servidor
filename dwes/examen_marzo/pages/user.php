<?php

if ($_SESSION["perfil"] != "rol1") {
    header("Location: index.php");
} else {
    $carta = new Carta($_SESSION["usuario"]);
    $carta->escribirCartaPago();

    echo "<p><a href=\"./archivos/cartapago".$_SESSION["usuario"].".txt\" download=\"cartapago".$_SESSION["usuario"].".txt\">Descargar la carta de ".$_SESSION["usuario"]."</a></p>";
  
    echo "<form action=".$_SERVER['PHP_SELF']."?page=user"." method=\"post\">
    Serie: <input type='text' name='busqueda'> Buscar
    <input type='submit' value='Buscar' name='buscar'>
    </form>";

    echo "<form action=".$_SERVER['PHP_SELF']."?page=user"." method=\"post\">
    <p><input type='submit' value='Series recomendadas' name='recomendadas'></p>
    </form>";


    if (isset($_POST['buscar'])){
      echo "<h2>Series encontradas</h2>";
      imprimeSeries($_SESSION["serie"]->buscarSeries($_POST["busqueda"]));
    }else if (isset($_POST["recomendadas"])) {
      echo "<p>Listado de Series Recomendadas</p>";
      imprimeSeries($_SESSION["serie"]->mostrarSeriesRecomendadas());
    } else {
      echo "<p>Listado de Series</p>";
      imprimeSeries($_SESSION["serie"]->mostrarSeries());
    }


  if (isset($_GET["favorito"])) {
      $_SESSION["serie"]->annandirSerieFavorita($_SESSION["idUser"], $_GET["favorito"]);
      header("Location: index.php?page=user");
    }

  if (isset($_GET["desFavorito"])) {
      $_SESSION["serie"]->eliminarSerieFavorita($_SESSION["idUser"], $_GET["desFavorito"]);
      header("Location: index.php?page=user");

    }

}

?>