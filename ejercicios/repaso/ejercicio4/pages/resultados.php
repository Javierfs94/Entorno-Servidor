<?php
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$edad = $_POST['edad'];
$idiomas = $_POST['idiomas'];
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

echo "Nombre: $nombre<br>";
echo "Genero: $genero<br>";


echo "<br>Idiomas: ";
for ($i=0; $i < count($idiomas) ; $i++) { 
    echo $idiomas[$i]."\t";
}


if ($edad == 1) {
    echo "Es menor de 18 años<br>";   
}else{
    echo "Es mayor de 18 años<br>";
}


?>   

<?php

echo "<br/><a href='../includes/verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";

    include("../includes/footer.php");
?>
</body>
</html>


