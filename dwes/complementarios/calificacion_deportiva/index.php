<?php
/*
* Titulo: Ejercicio 4
* Descripcion: Escribe un programa que muestre la clasificación deportiva almacenada en un array.
* Autor: Francisco Javier Frías Serrano
*/
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calificación deportiva</title>
</head>

<body>

<div>
    <h2>Calificación deportiva</h2>
    <p>Escribe un programa que muestre la clasificación deportiva almacenada en un array.</p>
</div>

<?php
$equipos = array(
    '0' => array(
        "logo" => '<img src="img/bucks.png">', 
        "nombre" => "Bucks",
        "V" => 53,
        "D" => 12
    ),
    '1' => array(
        "logo" => '<img src="img/raptors.png" >', 
        "nombre" => "Raptors",
        "V" => 46,
        "D" => 18
    ),
    '2' => array(
        "logo" => '<img src="img/celtics.png">', 
        "nombre" => "Celtics",
        "V" => 43,
        "D" => 21
    ),
    '3' => array(
        "logo" => '<img src="img/heat.png">', 
        "nombre" => "Heat",
        "V" => 41,
        "D" => 24
    ),
    '4' => array(
        "logo" => '<img src="img/pacers.png">', 
        "nombre" => "Pacers",
        "V" => 40,
        "D" => 26
    ),
    '5' => array(
        "logo" => '<img src="img/76ers.png">', 
        "nombre" => "76ers",
        "V" => 39,
        "D" => 26
    ),
    '6' => array(
        "logo" => '<img src="img/nets.png">', 
        "nombre" => "Nets",
        "V" => 30,
        "D" => 34
    ),
    '7' => array(
        "logo" => '<img src="img/magic.png">', 
        "nombre" => "Magic",
        "V" => 30,
        "D" => 35
    ),
    '8' => array(
        "logo" => '<img src="img/wizards.png">', 
        "nombre" => "Wizards",
        "V" => 24,
        "D" => 40
    ),
    '9' => array(
        "logo" => '<img src="img/hornets.png">', 
        "nombre" => "Hornets",
        "V" => 23,
        "D" => 42
    ),
    '10' => array(
        "logo" => '<img src="img/bulls.png">', 
        "nombre" => "Bulls",
        "V" => 22,
        "D" => 43
    ),
    '11' => array(
        "logo" => '<img src="img/knicks.png">', 
        "nombre" => "Knicks",
        "V" => 21,
        "D" => 45
    ),
    '12' => array(
        "logo" => '<img src="img/pistons.png">', 
        "nombre" => "Pistons",
        "V" => 20,
        "D" => 46
    ),
    '13' => array(
        "logo" => '<img src="img/hawks.png">', 
        "nombre" => "Hawks",
        "V" => 20,
        "D" => 47
    ),
    '14' => array(
        "logo" => '<img src="img/cavaliers.png" >', 
        "nombre" => "Cavaliers",
        "V" => 19,
        "D" => 46
    )
 );
?>

<h2>Equipos</h2>
<table border="1px">
<tr>
    <th>Nº</th>
    <th>Logo</th>
    <th>Nombre</th>
    <th>V</th>
    <th>D</th>
  </tr>
<?php
foreach ($equipos as $indiceEquipo => $equipo) {
    echo "<tr>";
    echo "<td>".$indiceEquipo."</td>";
    foreach ($equipo as $indice => $valor) {
        echo "<td>".$valor."</td>";
    }
    echo "</tr>";
}
?>
</table>

<?php
    echo "<br/><a href='../../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";
?>
    <a href="../../../"><button>Volver</button></a>

</body>

</html>