<?php
session_start();
echo '<ul>';
if($_SESSION["perfil"]=="Invitado"){
    echo '<li><a href="index.php?page=home">Inicio</a></li>';
}
if($_SESSION["perfil"]=="ejercicio1"){
    echo '<li><a href="index.php?page=home">Inicio</a></li>';
    echo '<li><a href="index.php?page=ejercicio1">Zona ejercicio 1</a></li>';
    echo '<li><a href="index.php?page=cerrar">Salir</a></li>';
}

if($_SESSION["perfil"]=="ejercicio2"){
    echo '<li><a href="index.php?page=home">Inicio</a></li>';
    echo '<li><a href="index.php?page=ejercicio2">Zona ejercicio 2</a></li>';
    echo '<li><a href="index.php?page=cerrar">Salir</a></li>';
}

if($_SESSION["perfil"]=="administrador"){
    echo '<li><a href="index.php?page=home">Inicio</a></li>';
    echo '<li><a href="index.php?page=ejercicio1">Zona ejercicio 1</a></li>';
    echo '<li><a href="index.php?page=ejercicio2">Zona ejercicio 2</a></li>';
    echo '<li><a href="index.php?page=administrador">Zona administrador</a></li>';
    echo '<li><a href="index.php?page=cerrar">Salir</a></li>';
}
echo '</ul>';
/* echo '<ul>';
echo '<li><a href="index.php?page=home">Inicio</a></li>';
echo '<li><a href="index.php?page=ejercicio1">Ejercicio 1</a></li>';
echo '<li><a href="index.php?page=ejercicio2">Ejercicio 2</a></li>';
echo '</ul>'; */
?>
