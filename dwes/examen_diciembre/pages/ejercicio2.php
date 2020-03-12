<?php
session_start();
if($_SESSION["perfil"]=="ejercicio2" or $_SESSION["perfil"]=="administrador"){
    echo "<h1>Bienvenido a la zona del Ejercicio 2</h1>";
}else{
    header("Location: index.php");
}

?>