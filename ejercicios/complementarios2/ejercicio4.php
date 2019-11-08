<?php
/*
* Programa que dados dos números calcule la suma, resta, multiplicacion y division
*
* @author Francisco Javier Frías Serrano
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicios Complementarios 2 - Ejercicio 4</title>
</head>
<body>
    
<?php
$a = 5;
$b = 2;
// a + b = resultado
echo "$a + $b = ".($a + $b)."<br>";
echo "$a - $b = ".($a - $b)."<br>";
echo "$a * $b = ".($a * $b)."<br>";
echo "$a / $b = ".($a / $b);

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>

<a href="../../"><button>Volver</button></a>
</body>
</html>