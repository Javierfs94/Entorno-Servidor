<?php
session_start();
if($_SESSION["perfil"]=="administrador"){
    echo "<h1>Bienvenido a la zona del administrador</h1>";
    
}else{
    header("Location: index.php");
}


?>