<?php
$php_errormsg = "";

$usuarios = array(
    array('user' => 'admin' , 'pass' => 'root', 'perfil' => 'admin' ),
    array('user' => 'profesor' , 'pass' => 'profe', 'perfil' => 'profesor' ),
    array('user' => 'alumno' , 'pass' => 'alumno', 'perfil' => 'alumno' ),
    array('user' => 'usuario' , 'pass' => 'user', 'perfil' => 'adusuariomin' ));

$opciones = array(
    'admin' => 'index.php','profesor.php','admin.php',
    'profesor' => 'index.php','profesor.php','profesor.php',
    'alumno' => 'index.php','alumno.php','alumno.php',
    'usuario' => 'index.php' );


    




?>