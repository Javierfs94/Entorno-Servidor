<?php
/*
* Texto
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
    <title>Ejercicio de Repaso 1</title>
</head>
<body>
<?php
$array = array('Hola','Javi');
array_push($array,5);

for ($i=0; $i < count($array) ; $i++) { 
   echo $array[$i]." ";
}

echo "</br>";

$valores = array(
    'valor1' => array(1,2,3),
    'valor2' => array(4,5,6),

);


foreach ($valores as $key =>  $value) {
    echo $key;
    foreach ($valores[$key] as $value2) {
        echo $value2." ";
    }
    echo "<br>";
}
?>
</body>
</html>
<?php


