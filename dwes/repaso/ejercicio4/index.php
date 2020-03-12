<?php
/*
* Titulo: Ejercicio Repaso Formulario + Array
* Descripcion: Desarrollar una página estilo formulario que almacene varios tipos de datos del usuario, como su nombre, edad, ciudad, etc. 
* Almacenarlas y mostrarlas en una tabla
* Autor: Francisco Javier Frías Serrano
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
    <?php
        include("includes/cabecera.php");
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
            /*   if (isset($_GET['error'])) {
                  if ($_GET['error'] == 1) {
                      echo '<p style="color:red">Usuario o pass incorrectos</p>';
                  }
              } */
            include("pages/home.php");
          }
    ?>
    <?php

    echo "<br/><a href='includes/verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";

        include("includes/footer.php");
    ?>
</body>

</html>