<?php

if ($_SESSION["perfil"] != "admin") {
    header("Location: index.php");
}


  echo "<form action=".$_SERVER['PHP_SELF']."?page=adminClavesUsuarios"." method=\"post\">
            Usuario: <input type='text' name='busqueda'> Buscar
            <input type='submit' value='Buscar' name='buscar'>
        </form>";



    if (isset($_POST['buscar'])){
        imprimeUsuarios($_SESSION["user"]->buscarUsuario($_POST["busqueda"]));
    }


?>