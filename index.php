<!-- Estas en el PHP -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
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
                if (($_GET["page"]=="cliente")) {
                  include("pages/entornoCliente.php"); 
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