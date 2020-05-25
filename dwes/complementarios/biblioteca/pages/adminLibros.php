<?php

if ($_SESSION["perfil"] != "admin") {
  header("Location: index.php");
}


if (isset($_GET["activar"])) {
  $_SESSION["user"]->activar($_GET["activar"]);
}

if (isset($_GET["bloquear"])) {
  $_SESSION["user"]->bloquear($_GET["bloquear"]);
}

if (isset($_GET["eliminar"])) {
  $_SESSION["libro"]->delete($_GET["eliminar"]);
}

echo "<p>Listado de Libros</p>";
$libros = $_SESSION["libro"]->mostrarLibros();

echo "<table>
<tr>
<th>ID</th>
<th>Titulo</th>
<th>Autor</th>
<th>Editorial</th>
<th>Eliminar</th>
</tr>
";
  foreach ($libros as $key) {
    echo "<tr>
    <td>".$key["id"]."</td>
    <td>".$key["titulo"]."</td>
    <td>".$key["autor"]."</td>
    <td>".$key["editorial"]."</td>
    <td><button id='botonEliminar'><a href="."index.php?page=adminLibros&eliminar=".$key["id"].">Eliminar</a></button></td>
    </tr>";
  }  
  echo "</table>";

if (isset($_POST["addLibro"])) {
  $datos = array(
      'titulo' => $_POST["titulo"],  
      'autor' => $_POST["autor"],
      'editorial' => $_POST["editorial"]
  );
  $_SESSION["libro"]->set($datos);
  header("Location: index.php?page=adminLibros");
}


echo "<form method='post' action=".$_SERVER["PHP_SELF"]."?page=adminLibros"." name='signin-form'>
    <div class='form-element'>
        <label>Titulo</label>
        <input type='text' name='titulo' required />
    </div>
    <div class='form-element'>
        <label>Autor</label>
        <input type='text' name='autor' required />
    </div>
    <div class='form-element'>
      <label>Editorial</label>
      <input type='text' name='editorial' required />
    </div>
    <button type='submit' name='addLibro' value='login'>Añadir libro</button>
</form>";

?>