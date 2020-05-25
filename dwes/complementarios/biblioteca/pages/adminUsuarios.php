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
  $_SESSION["user"]->delete($_GET["eliminar"]);
}

echo "<p>Listado de Usuarios registrados</p>";
$usuarios = $_SESSION["user"]->mostrarUsuarios();

echo "<table>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Apellidos</th>
<th>DNI</th>
<th>Usuario</th>
<th>Password</th>
<th>Estado</th>
<th>Perfil</th>
<th>Activar</th>
<th>Bloquear</th>
<th>Eliminar</th>
</tr>
";
  foreach ($usuarios as $key) {
    echo "<tr>
    <td>".$key["id"]."</td>
    <td>".$key["nombre"]."</td>
    <td>".$key["apellidos"]."</td>
    <td>".$key["dni"]."</td>
    <td>".$key["usuario"]."</td>
    <td>".$key["pass"]."</td>
    <td>".$key["estado"]."</td>
    <td>".$key["perfil"]."</td>
    <td><button id='botonAceptar'><a href="."index.php?page=adminUsuarios&activar=".$key["id"].">Activar</a></button></td>
    <td><button id='botonBloquear'><a href="."index.php?page=adminUsuarios&bloquear=".$key["id"].">Bloquear</a></button></td>
    <td><button id='botonEliminar'><a href="."index.php?page=adminUsuarios&eliminar=".$key["id"].">Eliminar</a></button></td>
    </tr>";
  }  
  echo "</table>";

 

?>