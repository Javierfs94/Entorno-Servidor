<?php
session_start();
if($_SESSION["perfil"]=="alumno" or $_SESSION["perfil"]=="administrador"){
    echo "<h1>Bienvenido a la zona del alumno</h1>";
   
}else{
    header("Location: index.php");
}


?>