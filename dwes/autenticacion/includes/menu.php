<?php
session_start();
echo '<ul>';
if($_SESSION["perfil"]=="Invitado"){
    echo '<li><a href="index.php?page=home">Inicio</a></li>';
}
if($_SESSION["perfil"]=="alumno"){
    echo '<li><a href="index.php?page=home">Inicio</a></li>';
    echo '<li><a href="index.php?page=alumno">Zona alumno</a></li>';
    echo '<li><a href="index.php?page=cerrar">Salir</a></li>';
}

if($_SESSION["perfil"]=="profesor"){
    echo '<li><a href="index.php?page=home">Inicio</a></li>';
    echo '<li><a href="index.php?page=profesor">Zona profesor</a></li>';
    echo '<li><a href="index.php?page=cerrar">Salir</a></li>';
}

if($_SESSION["perfil"]=="administrador"){
    echo '<li><a href="index.php?page=home">Inicio</a></li>';
    echo '<li><a href="index.php?page=alumno">Zona alumno</a></li>';
    echo '<li><a href="index.php?page=profesor">Zona profesor</a></li>';
    echo '<li><a href="index.php?page=administrador">Zona administrador</a></li>';
    echo '<li><a href="index.php?page=cerrar">Salir</a></li>';
}
echo '</ul>';
