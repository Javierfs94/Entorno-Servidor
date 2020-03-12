<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Francisco Javier Frías Serrano">
    <meta name="keywords" content="php,entorno,servidor,cordoba,grancapitan,daw,informatica">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Server</title>
</head>

<body>
    <?php
    include("pages/cabecera.php");
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
        include("pages/footer.php");
    ?>
</body>

</html>