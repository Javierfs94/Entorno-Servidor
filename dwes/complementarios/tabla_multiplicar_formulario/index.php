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

<div>
    <h2>Tabla de multiplicar con formularios</h2>
    <p>Escribe un programa que muestre una tabla html con las tablas de multiplicar del 1 al 10. Cambiar el color en cada fila para mejorar la lectura.</p>
     <p>Selección del número de tablas y a que números corresponden.</p>
     <p>Permitir un número indeterminado de inputs. (50% o configuración)</p>
     <p>Validación de los resultados introducidos.</p>
</div>

<?php

echo "<h2>Tabla de multiplicar</h2>";
echo "<table border=\"1\">";
for ($i=1; $i < 11; $i++) { 
    echo "<tr>";
    echo "<td>Tabla del ".$i."</td>";
    for ($y=1; $y < 11; $y++) { 
        echo "<td>".$i*$y."</td>";   
    }
    echo "</tr>";
}
echo "</table>";
?>


<?php
    echo "<br/><a href='../../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
    <a href="../../../"><button>Volver</button></a>

</body>

</html>