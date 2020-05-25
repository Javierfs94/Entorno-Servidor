<?php
/*
* Titulo: Biblioteca
* Descripcion: Ejercicio de Gestión de una Biblioteca
* Autor: Francisco Javier Frías Serrano
*/
?>
<?php
    include "./config/config.php";
    include "./classes/Usuario.php";
    include "./classes/Libro.php";
    include "./classes/Prestamo.php";
    session_start();

if (isset($_POST["exit"])) {
    header("Location: ./includes/logout.php");
}

if (!isset($_SESSION["logged"])) {
    $_SESSION["user"] = Usuario::singleton();
    $_SESSION["libro"] = Libro::singleton();
    $_SESSION["prestamo"] = Prestamo::singleton();
    $_SESSION["logged"] = false;
    $_SESSION["perfil"] = "invitado";
    $_SESSION["estado"] = "pendiente";
    $_SESSION["idUser"] = null;
}

if (isset($_POST["login"])) {
    $array = $_SESSION["user"]->get($_POST["usuario"]); 
    if (sizeof($array) == 1) {
        if ($array[0]["pass"] == $_POST["password"] ) {
            $_SESSION["logged"] = true;   
            $_SESSION["idUser"] =  $array[0]["id"];
            $_SESSION["perfil"] = $array[0]["perfil"];
            $_SESSION["estado"] = $array[0]["estado"];
            if ($_SESSION["perfil"] == "admin") {
                header("Location: index.php?page=adminLibros");
            }   
            if ($_SESSION["perfil"] == "lector") {
                header("Location: index.php?page=lectorLibros");
            }         
        }
    } else {
        header("Location: index.php?page=login");
    } 
}


  
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Francisco Javier Frías Serrano">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo TITULO; ?></title>
</head>

<body>
<?php
    include "./includes/cabecera.php";
if (isset($_SESSION['perfil'])) {
    include "./includes/conectado.php";
}

include "./includes/nav.php";

?>

<main>

<?php 
    if (isset($_GET["page"])){
        if (($_GET["page"]=="index")) {
            include ("index.php"); 
        }
        if (($_GET["page"]=="login")) {
            include ("./pages/login.php"); 
        }
        if (($_GET["page"]=="register")) {
            include ("./pages/register.php"); 
        }
        if (($_GET["page"]=="adminLibros")) {
            include ("./pages/adminLibros.php"); 
        }
        if (($_GET["page"]=="adminPrestamos")) {
            include ("./pages/adminPrestamos.php"); 
        } 
        if (($_GET["page"]=="adminUsuarios")) {
            include ("./pages/adminUsuarios.php"); 
        }
        if (($_GET["page"]=="lectorLibros")) {
            include ("./pages/lectorLibros.php"); 
        }
        if (($_GET["page"]=="lectorPrestamos")) {
            include ("./pages/lectorPrestamos.php"); 
        }                        
    }else {
        include ("./pages/home.php");
    }
?>

</main>

<?php
    include("./includes/footer.php");
?>

</body>

</html>