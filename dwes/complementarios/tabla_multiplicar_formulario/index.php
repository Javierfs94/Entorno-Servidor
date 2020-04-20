<?php
/*
* Titulo: Ejercicio 1 versión 2
* Descripcion: Escribe un programa que muestre una tabla html con las tablas de multiplicar del 1 al 10. Cambiar el color en cada fila para mejorar la lectura.
* Selección del número de tablas y a que números corresponden.
* Permitir un número indeterminado de inputs. (50% o configuración)
* Validación de los resultados introducidos.
* 
* Autor: Francisco Javier Frías Serrano
*/
?>

<?php
$tablasARellenar = 0;
$cantidadBien = 0;
$cantidadMal = 0;
$cantidadSinResponder = 0;
$mensaje="";

// Muestra el resultado en texto y con cantidades
if (isset($_POST["numero"]) && isset($_POST["numero"])!= "") {
    foreach ($_POST["numero"] as $tabla => $numero) {
        foreach ($numero as $indice => $valor) {
            if ($valor == $tabla*$indice) {
                $cantidadBien++;
            }elseif ($valor == "") {
                $cantidadSinResponder++;
            }else{
                $cantidadMal++;
            }
    }
    $mensaje = "Has acertado un total de ".$cantidadBien." y has fallado un total de ".$cantidadMal. " y has dejado ".$cantidadSinResponder. " sin responder"; 
    }
   
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Tabla de multiplicar con formularios</title>
</head>

<body>

<?php


if (!isset($_POST["tablasARellenar"]) || $_POST["tablasARellenar"] == ""){
    echo"<form action='index.php' method='post'>
        <p>¿Cuantas tablas quieres rellenar? <input type='number' name='tablasARellenar' min=\"1\" max=\"10\"></p>
    <input type='submit' value='Enviar'>
</form>
";
}


if (isset($_POST["tablasARellenar"]) && $_POST["tablasARellenar"]!="" && !isset($_POST["0"])){
    $tablasARellenar = $_POST["tablasARellenar"];
    echo "<form action='index.php' method='post'>";
    echo "<p>Introduzca las tablas que quiera calcular:</p>";
    for ($i=0; $i < $tablasARellenar; $i++) { 
        echo"<input type='number' name=\"".$i."\" min=\"1\" max=\"10\"><br>";
        echo"<input type='hidden' name='tablasARellenar' value=\"".$tablasARellenar."\"><br>";
    }
    echo "<input type='submit' name='enviar/>";
    echo "</form>";
}


if (isset($_POST["mensaje"])){
    echo "<p>".$mensaje."</p>";
    for ($i=0; $i < $tablasARellenar; $i++) { 
        for ($j=1; $j < 11; $j++) {
            echo $_POST[$i]*$j, $_POST["numero"][$i][$j];
        }
    }
}

if (isset($_POST["0"])) {
    $tablasARellenar = $_POST["tablasARellenar"];
    echo "<h1>Tablas de multiplicar</h1>";    
    echo "<table style='border: 1px solid black'>";
    echo "<form action='index.php' method='post'>";


if (isset($_POST["numero"]) && isset($_POST["numero"])!= "") {
    
    foreach ($_POST["numero"] as $tabla => $numero) {
    echo"<input type='hidden' name=\"".$tabla."\" value=\"".$tabla."\">";
    echo"<input type='hidden' name='mensaje'>";
    echo"<input type='hidden' name='tablasARellenar' value=\"".$tablasARellenar."\"><br>";
    echo "<tr style='border: 1px solid black; background-color: #ffff00;'>";
    echo "<th style='border: 1px solid black;'>Tabla del ".$tabla."</th>";
        foreach ($numero as $indice => $valor) {
            if ($valor == $tabla * $indice) {
                echo "<td style='border: 1px solid black; margin: 5px; background-color: lightgreen'>";
                echo $tabla." x ".$indice." = <input type='number' name=\"numero[$tabla][$indice]\" value=\"$valor\"/>";
                echo "</td>";
            }else{
                echo "<td style='border: 1px solid black; margin: 5px; background-color: #00acc1s'>";
                echo $tabla." x ".$indice." = <input type='number' name=\"numero[$tabla][$indice]\" value=\"$valor\"/>";
                echo "</td>";
            }
        }echo "</tr>";
    } 
    
}else{
   
for ($i=0; $i < $tablasARellenar; $i++) {
echo"<input type='hidden' name=\"".$i."\" value=\"".$_POST[$i]."\">";
echo"<input type='hidden' name='mensaje'>";
echo"<input type='hidden' name='tablasARellenar' value=\"".$tablasARellenar."\"><br>";
echo "<tr style='border: 1px solid black; background-color: #ffff00;'>";
echo "<th style='border: 1px solid black;'>Tabla del ".$_POST[$i]."</th>";

    $mostrados = array();

        do {
            $posicion =  rand(1, 10);
            if(!in_array($posicion, $mostrados)){
                array_push($mostrados, $posicion);
            }
        } while (count($mostrados) < 5);

        for ($j=1; $j < 11; $j++) {
            if (!in_array($j, $mostrados)){
            echo "<td style='border: 1px solid black; margin: 5px;'>";
            echo $_POST[$i]." x ".$j." = <input type='number' name=\"numero[$_POST[$i]][$j]\">";
            echo "<br>";
            echo "</td>";
            }else{
            echo "<td style='border: 1px solid black; margin: 5px;'>";
            echo $_POST[$i]." x ".$j." = <input type='number' name=\"numero[$_POST[$i]][$j]\" value=\"".($_POST[$i]*$j)."\" >";
            echo "<br>";
            echo "</td>";
            }
        }
       
    }
     echo "</tr>";
}
echo "</table>";
echo "<br>";
echo"<input type='hidden' name='tablasARellenar' value=\"".$tablasARellenar."\"><br>";
echo "<input type='submit' name='enviar/>";
echo "</form>";

};

?>


<?php
    // Boton para ir al repositorio del ejercicio
    echo "<p><a href='https://github.com/Javierfs94/Entorno-Servidor/tree/master/dwes/complementarios/tabla_multiplicar_formulario'><button>Repositorio</button></a></p>";    
?>

</body>

</html>