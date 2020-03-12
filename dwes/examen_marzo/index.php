<?php
    session_start();
    if (!isset($_SESSION["logged"])) {
        $_SESSION["logged"] = false;
        $_SESSION["user"] = "invitado";
    }

    function showSeries(){
        require_once('app/Usuario.php');
        $usuario = New Usuario();
        $usuario-> getSerie($_SESSION['user']);
        echo "<table border=1><tr><th>Series</th><th>¿Eliminar?</th></tr>";
        foreach ($usuario->lista as $key => $value) {
            $bk = $value['bm_url'];
            echo "<tr>
            <td>$bk</td>
            <td>
            <form method='POST' action='pages/removeSeries.php'>
            <input type='hidden' name='bk' value='$bk'>
            <input type='submit' value='Eliminar' onclick='return confirm(\"¿Estás seguro de eliminarlo?\")'>
            </form>
            </td>
            </tr>";
        }
        echo "</table>";
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Francisco Javier Frías Serrano">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Examen DWES Marzo - Francisco Javier Frías Serrano</title>
</head>
<body>
    <?php include "include/cabecera.php";?>
    <h1>Series TV</h1>
    <?php 
        if($_SESSION['logged']){
            echo " | <a href='./index.php'>Inicio</a>";
            echo " | <a href='./pages/addSeries.php'>Añadir series</a>";
            echo " | <a href='./pages/topSeries.php'>TOP series</a>";
            echo " | <a href='./logout.php'>Logout</a>";
            echo "<hr>";
            showSeries();
        }
        else {
            header("Location: login.php");
        }
    ?>
    <?php include "include/footer.php"; ?>
</body>
</html>