<?php

if ($_SESSION["perfil"] != "lector") {
    header("Location: index.php");
}

if ($_SESSION["estado"] == "activado") {
    echo "<p>PÁGINA DE LIBROS DEL LECTOR</p>";
}

if ($_SESSION["estado"] == "bloqueado") {
    echo "<p>Ha sido bloqueado por el consejo supremo</p>";
}

?>