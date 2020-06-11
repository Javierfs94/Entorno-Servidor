<?php

if ($_SESSION["perfil"] != "admin") {
  header("Location: index.php");
}else {
 
  echo "<h1>Nueva encuesta</h1>";

  echo "<form method='post' action=".$_SERVER["PHP_SELF"]."?page=admin>
  <p>Titulo: <input type='text' name='Titulo'></p>
  <p>Fecha Inicio (2020-06-07 00:00:00):<input type='datetime' name='fechaHoraInicio'></p>
  <p>Fecha Final (2020-06-15 00:00:00):<input type='datetime' name='fechaHoraFinal'></p>
  <p><input type='submit' name='nuevaEncuesta' value='Nueva encuesta'></p>  
  </form>";


  echo "<h1>Nueva pregunta</h1>";

  echo "<form method='post' action=".$_SERVER["PHP_SELF"]."?page=admin>
  <p>ID Encuesta: <input type='text' name='idEncuesta'></p>
  <p>Pregunta:<input type='text' name='pregunta'></p>
  <p><input type='submit' name='nuevaPregunta' value='Nueva pregunta'></p>  
  </form>";

  if (isset($_POST["nuevaEncuesta"])) {
    $datos = array(
        'Titulo' => $_POST["Titulo"],  
        'fechaHoraInicio' => $_POST["fechaHoraInicio"],
        'fechaHoraFinal' => $_POST["fechaHoraFinal"]
    );
    $_SESSION["encuesta"]->setEncuesta($datos);
    echo $_SESSION["encuesta"]->getMensaje();
  }


  if (isset($_POST["nuevaPregunta"])) {
    $_SESSION["encuesta"]->setPregunta($_POST["idEncuesta"], $_POST["pregunta"]);
    echo $_SESSION["encuesta"]->getMensaje();
  }



}


?>