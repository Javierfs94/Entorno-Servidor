<?php
/*
* Escribe un programa que muestre tu nombre y tus apellidos, previamente cargados en variables.
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
$nombre = "Francisco Javier";
$apellidos = "Frías Serrano";

echo $nombre." ".$apellidos;

    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
   <a href="../../"><button>Volver</button></a>

</body>
</html>