<?php
/*
* Titulo: Buscaminas
* Descripcion: Diseñar el juego del Buscaminas
* Autor: Francisco Javier Frías Serrano
*/

include("config/parametros.php");

// Control de sesión
session_start();
if (!isset($_SESSION["tablero"])) {
    $_SESSION["tablero"] = array();
    $_SESSION["visible"] = array();
}

/**
 * Obtener el color de la celda
 * 
 * @param id Número que contiene la celda
 */
function cell_class($id) {
    switch($id) {
        case 0:
            return "empty";
        case -1:
            return "mine";
        case 1:
            return "around1";
        case 2:
            return "around2";
        case 3:
            return "around3";
        case 4:
            return "around4";
        default:
            return "other";
    }
}

/**
 * Generar tablero vacío
 */
function generar_tablero() {
    for ($f = 0; $f < NUM_FILAS; $f++) {
        for ($c = 0; $c < NUM_COLUMNAS; $c++) {
            $_SESSION["tablero"][$f][$c] = 0;
            $_SESSION["visible"][$f][$c] = true;
        }
    }
}

/**
 * Dibujar tablero
 */
function dibujar_tablero() {
    echo "<table>";
    for ($f = 0; $f < NUM_FILAS; $f++) {
        echo "<tr>";
        for ($c = 0; $c < NUM_COLUMNAS; $c++) {
            if ($_SESSION["visible"][$f][$c]) {
                echo "<td class=\"".cell_class($_SESSION["tablero"][$f][$c])."\">";
                echo $_SESSION["tablero"][$f][$c];
            } else {
                echo "<td class=\"".cell_class(0)."\">";
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

/**
 * Generar minas en el tablero
 */
function generar_minas() {
    $count = 0;
    while ($count < NUM_MINAS) {
        // Posición aleatoria vacía
        do {
            $f = rand(0, NUM_FILAS - 1);
            $c = rand(0, NUM_COLUMNAS - 1);
        } while ($_SESSION["tablero"][$f][$c] == -1);

        // Poner mina
        $_SESSION["tablero"][$f][$c] = -1;

        // Incrementar alrededor
        for ($i = max($f - 1, 0); $i <= min($f + 1, NUM_FILAS - 1); $i++) {
            for ($j = max($c - 1, 0); $j <= min($c + 1, NUM_COLUMNAS - 1); $j++) {
                if ($_SESSION["tablero"][$i][$j] != -1) {
                    $_SESSION["tablero"][$i][$j]++;
                }
            }
        }
        
        $count++;
    }
}

/**
 * Iniciar juego
 */
function iniciar_juego() {
    generar_tablero();
    generar_minas();
    dibujar_tablero();
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
    include("includes/cabecera.php");
    // Menu
    echo '<nav>
        <ul>
            <li><a href="index.php">Reiniciar</a></li>
        </ul>
    </nav>';
?>
    <?php 
   iniciar_juego();
    ?>

    <?php
        include("includes/footer.php");
    ?>
</body>

</html>