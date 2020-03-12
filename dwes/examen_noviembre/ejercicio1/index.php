<?php
/*
* Titulo: Horario
* Descripcion: Array que almacena la información del horario de 2ºDAW
* Autor: Francisco Javier Frías Serrano
* Fecha: 18/11/2019
*/
?>
<?php
    include("config/parametros.php");
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

<div id="principal"> 
     <?php
     // Cabecera de la página
        include("includes/cabecera.php");
    // Menu de la página
        echo '<nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </nav>';
    ?>
    <?php 
          if (isset($_GET["page"])){
                if (($_GET["page"]=="index")) {
                    include("index.php"); 
                }                      
          }else {
            include("pages/home.php");
          }
    
    ?></div>

<?php
    // Muestra un boton que permite ver el codigo de la página
    echo "<br/><a href='includes/verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";
?>
    <?php
    // Pie de la página
    include("includes/footer.php");
    ?>
</body>

</html>