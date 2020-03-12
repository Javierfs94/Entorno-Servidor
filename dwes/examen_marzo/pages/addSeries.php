<?php
    function addNewSerie($serie){
        require_once('../app/Usuario.php');
        $usuario = New Usuario();
        $usuario-> addSerie($_SESSION["user"], $serie);
        return $usuario->serieok;
    }

    session_start();
    if (!isset($_SESSION["logged"])) {
        $_SESSION["logged"] = false;
        $_SESSION["user"] = "invitado";
    }

    $error = "";

    if (isset($_POST["enviado"]) && isset($_POST['serie'])) {
        if(empty($_POST['serie'])){
            $error = "<font color=\"red\"> Rellena la serie</font>";
        }
        else {
            if(addNewSerie($_POST['serie'])){
                header("Location: ../index.php");
            }
            else {
            $error = "<font color=\"red\"> Añade una serie correcta</font>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Francisco Javier Frías Serrano">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Examen DWES Marzo - Francisco Javier Frías Serrano</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include "../include/cabecera.php"; ?>
    <h1>Añadir nuevas Series</h1>
    <?php 
    if($_SESSION['logged']){
        echo " | <a href='../index.php'>Inicio</a>";
        echo " | <a href='addSeries.php'>Añadir series</a>";
        echo " | <a href='./topSeries.php'>TOP series</a>";
        echo " | <a href='../logout.php'>Logout</a>";
        echo "<hr>";
        echo "<p>Logueado como <b>".$_SESSION['user']."</b></p>";
    }
    else {
        header("Location: ../index.php");
    }
    ?>
    <form method="POST" action="addSeries.php">
    <label>Nueva serie: <input type="url" name="serie" required></label>
    <input type="hidden" name="enviado" value="enviado">
    <input type="submit" value="Crear Serie">
    <br> <?php echo $error; ?>
    </form>
    <?php include "../include/footer.php"; ?>
</body>
</html>