<?php
/*
* Titulo: Ejemplo de clases y objetos en PHP
* Descripcion: Probando la Programación Orientada a Objetos con PHP
* Autor: Francisco Javier Frías Serrano
*/
?>
<?php
    include("config/parametros.php");
    require_once("clases/Mascotas.php");
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
    include("includes/cabecera.php");
?>
    <?php   
 
 $mascota1 = new Mascotas("Toby");
 $mascota2 = new Mascotas("Mika");
 $mascota3 = new Mascotas("Canela");

 echo "<p>Hay un total de ".Mascotas::total()." mascotas</p>";


  ?>
    <?php
        include("includes/footer.php");
    ?>
</body>

</html>