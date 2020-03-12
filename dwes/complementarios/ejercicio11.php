<?php
/*
* Realizar un ejercicio que a partir de dos variables enteras, aisgnarle unos valores y mostrar por pantalla.
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
    <title>Ejercicios Complementarios 2 - Ejercicio 6</title>
</head>
<body>
<?php
$num1 = 3;
$num2 = 7;

echo "El valor de la variable num1 es: ".$num1."<br>";
echo "El valor de la variable num2 es: ".$num2."<br>";
echo "La suma de $num1 y $num2 es: ".($num1+$num2)."<br>";
echo "El producto de $num1 por $num2 es: ".($num1*$num2)."<br>";
echo "La cociente de $num1 y $num2 es: ".($num1/$num2)."<br>";
echo "El resto de dividir $num1 entre $num2 es: ".($num1%$num2);

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>

<a href="../../"><button>Volver</button></a>
</body>
</html>