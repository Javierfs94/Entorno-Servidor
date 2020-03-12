<?php
/*
* Definir una variable de cada tipo: integer, double, string y boolean. 
Luego imprimirlas en la pagina, una por linea.
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
    <title>Ejercicios Complementarios 1 - Ejercicio 1</title>
</head>
<body>

<?php

$integer = 5;
$double = 5.5;
$string = "Hola";
$boolean = True;

echo $integer."<br>";
echo $double."<br>";
echo $string."<br>";
echo $boolean;

    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
   <a href="../../"><button>Volver</button></a>

</body>
</html>