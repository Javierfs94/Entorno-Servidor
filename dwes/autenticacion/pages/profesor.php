<?php
session_start();
if($_SESSION["perfil"]=="profesor" or $_SESSION["perfil"]=="administrador"){
    echo "<h1>Bienvenido a la zona del profesor</h1>";
}else{
    header("Location: index.php");
}
?>