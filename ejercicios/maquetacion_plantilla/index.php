<?php
/*
* Titulo: 
* Descripcion: 
* Autor:
* Fecha: 
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
?>
    <?php 
          if (isset($_GET["page"])){
                if (($_GET["page"]=="index")) {
                    include("index.php"); 
                }
                if (($_GET["page"]=="servidor")) {
                  include("pages/entornoServidor.php"); 
                }                          
          }else {
            include("pages/home.php");
          }
          ?>

    <?php
        include("includes/footer.php");
    ?>
</body>

</html>