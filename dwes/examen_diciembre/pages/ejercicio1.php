<?php
session_start();
if($_SESSION["perfil"]=="ejercicio1" or $_SESSION["perfil"]=="administrador"){
    echo "<h1>Bienvenido a la zona del Ejercicio 1</h1>";   
}else{
    header("Location: index.php");
}


/* $noticias = array(
    "Videojuegos" => array("Videojuego1","Videojuego2","Videojuego3"),
    "Literatura" => array("Literatura1","Literatura2"),
    "Cine" => array("Cine1","Cine2","Cine3","Cine4"),
    "Series" => array("Series1","Series2")
);

foreach ($noticias as $noticia) {
    echo $noticia."<br>";
    foreach ($noticia as $key => $value) {
        echo $noticia[$key]."<br>";

    }

}
 */



?>