<?php
/*
* Calcular el salario de un trabajador con un impuesto
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
$salarioTrabajador = 3500 ;
$impuesto = 20; // Porcentaje
$sueldoReal = $salarioTrabajador - (($salarioTrabajador/100)*$impuesto);
echo "Sueldo del trabajador sin puesto: ".$salarioTrabajador."<br>Con el impuesto: ".$sueldoReal."";

    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
   <a href="../../"><button>Volver</button></a>

</body>
</html>