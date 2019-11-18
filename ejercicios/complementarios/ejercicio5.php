<?php
/*
* Investiga las funciones para generar números aleatorios y escribe un script que
muestre por pantalla un valor aleatorio (0-100), indicando si es menor, mayor o igual
a 50.
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
$numero = rand(0,100);
$condicion = ($numero>=50) ? " es mayor " : " es menor ";

 echo $numero.$condicion."50" ;


    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
   <a href="../../"><button>Volver</button></a>

</body>
</html>