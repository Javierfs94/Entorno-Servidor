<?php

if ($_SESSION["perfil"] != "lector") {
    header("Location: index.php");
}

if ($_SESSION["estado"] == "activado") {

    echo "<p>Listado de Libros Prestados</p>";
    $libros = $_SESSION["prestamo"]->mostrarPrestamosLector($_SESSION["idUser"]);
    
    echo "<table>
    <tr>
    <th>Titulo</th>
    <th>Autor</th>
    <th>Editorial</th>
    </tr>
    ";
      foreach ($libros as $key) {
        echo "<tr>
        <td>".$key["titulo"]."</td>
        <td>".$key["autor"]."</td>
        <td>".$key["editorial"]."</td>
        </tr>";
      }  
      echo "</table>";


}

if ($_SESSION["estado"] == "bloqueado") {
    echo "<p>Ha sido bloqueado por el consejo supremo</p>";
}

?>