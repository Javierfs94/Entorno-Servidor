<?php

$personas = array(
array('usuario' => 'Javier', 
'pass' => '1234', 
'perfil' => 'usuario'
), 

array('usuario' => 'Luis', 
'pass' => 'afufu', 
'perfil' => 'usuario'
), 


array('usuario' => 'Paco', 
'pass' => 'pak', 
'perfil' => 'alumno'
), 

array('usuario' => 'Ana', 
'pass' => 'ana', 
'perfil' => 'alumno'
), 


array('usuario' => 'María', 
'pass' => 'mari', 
'perfil' => 'alumno'
), 

array('usuario' => 'Jaime', 
'pass' => 'pagina', 
'perfil' => 'profesor'
), 

array('usuario' => 'Geralt', 
'pass' => 'rivia', 
'perfil' => 'profesor'
), 

array(
    'usuario' => 'admin', 
    'pass' => 'root', 
    'perfil' => 'admin')
);

$usuariosTotales = 0;
$usuarios = 0;
$alumnos = 0;
$profesores = 0;
$admins = 0;
?>
<?php
    include("../config/parametros.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Francisco Javier Frías Serrano">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo TITULO; ?></title>
</head>
<body>
<?php
    include("../includes/cabecera.php");
    ?>

<nav>
<ul>
<li><a href="../index.php">Inicio</a></li>
</ul>
</nav>
<?php


echo '<h2>Tabla de usuarios</h2>
<table border="1">
<tr>
<th>Usuario</th>
<th>Pass</th>
<th>Perfil</th>
</tr>';
foreach ($personas as $key =>  $value) {
    echo   '<tr>';
    foreach ($personas[$key] as $value2) {
        echo "<td>$value2</td>";
    }
echo '</tr>';      
   
}

echo  '</table>';

echo "<br>";

foreach ($personas as $key =>  $value) {
    $usuariosTotales++;
    foreach ($personas[$key] as $key2 => $value2) { 
        if ($key2 == 'perfil' && $value2 == 'usuario') {
            $usuarios++;
        }
        if ($key2 == 'perfil' && $value2 == 'alumno') {
            $alumnos++;
        }
        if ($key2 == 'perfil' && $value2 == 'profesor') {
            $profesores++;
        }        
        if ($key2 == 'perfil' && $value2 == 'admin') {
            $admins++;
        }
    }
echo '</tr>';   
}

echo "Número de usuarios en total: " . $usuariosTotales . "<br>";
echo "Número de usuarios: " . $usuarios . "<br>";
echo "Número de alumnos: " . $alumnos . "<br>";
echo "Número de profesores: " . $profesores . "<br>";
echo "Número de administradores: " . $admins. "<br>";


?>   

<?php

echo "<br/><a href='../includes/verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";

    include("../includes/footer.php");
?>
</body>
</html>


