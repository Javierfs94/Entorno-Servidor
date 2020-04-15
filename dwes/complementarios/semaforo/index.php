<?php
/*
* Titulo: Ejercicio 1
* Descripcion: Escribe un programa que muestre un semáforo con los tres colores encendidos.
* Autor: Francisco Javier Frías Serrano
*/
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Semaforo</title>
</head>

<body>

<div>
    <h2>Semaforo</h2>
    <p>Escribe un programa que muestre un semáforo con los tres colores encendidos.</p>
</div>


<table style='border: 1px solid black; background-color: black'>
<?php
$colores = array("green","yellow","red");
for ($i=0; $i < 3 ; $i++) { 
    echo "<tr>";
    echo "<td>";
    echo "<svg height='120' width='120'>";
    echo "<circle cx='60' cy='60' r='50' fill='$colores[$i]'";
    echo "<svg>";
    echo "</td>";
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