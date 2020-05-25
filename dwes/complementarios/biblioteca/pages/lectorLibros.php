<?php

if ($_SESSION["perfil"] != "lector") {
    header("Location: index.php");
}

if (isset($_GET["reservar"])) {
    $date = date("Y/m/d");
    $datos = array(
        'id_usuario' => $_SESSION["idUser"],
        'id_libro' => $_GET["reservar"],
        'prestado' => $date
    );

    $_SESSION["prestamo"]->set($datos);
    header("Location: index.php?page=lectorLibros");

}

if (isset($_GET["devolver"])) {
    $date = date("Y/m/d");
    $datos = array(
        'id_usuario' => $_SESSION["idUser"],
        'id_libro' => $_GET["reservar"],
        'prestado' => $date
    );

    $_SESSION["prestamo"]->set($datos);
    header("Location: index.php?page=lectorLibros");

}




if ($_SESSION["estado"] == "activado") {

    echo "<p>Listado de Libros</p>";
    $libros = $_SESSION["libro"]->mostrarLibros();
    
    echo "<table>
    <tr>
    <th>ID</th>
    <th>Titulo</th>
    <th>Autor</th>
    <th>Editorial</th>
    <th>Reservar</th>
    </tr>
    ";
      foreach ($libros as $key) {
        echo "<tr>
        <td>".$key["id"]."</td>
        <td>".$key["titulo"]."</td>
        <td>".$key["autor"]."</td>
        <td>".$key["editorial"]."</td>
        <td><button id='botonReservar'><a href="."index.php?page=lectorLibros&reservar=".$key["id"].">Reservar</a></button></td>
        </tr>";
      }  
      echo "</table>";
    

}


if ($_SESSION["estado"] == "bloqueado") {
    echo "<p>Ha sido bloqueado por el consejo supremo</p>";
}




?>