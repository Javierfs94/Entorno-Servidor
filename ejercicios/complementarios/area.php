<?php
/*
* Calcular el área de in triángulo cuya fórmula es a=(b*h)/2
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
    <title>Ejercicio Complementario - Salario</title>
</head>
<body>

<?php
$b = 15 ;
$h = 12; 
$area = ($b*$h)/2;

echo "Base: ".$b."<br>Altura: ".$h."<br>Área: ".$area."";

    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
   <a href="../../"><button>Volver</button></a>

</body>
</html>