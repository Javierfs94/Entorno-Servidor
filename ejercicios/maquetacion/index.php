<?php
    // Bloque de documentación
    include("config/parametros.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title id="top"><?php echo TITULO; ?></title>
</head>
<body>
    <header>
      <h1><?php echo CABECERA; ?></h1>
    </header>
    <nav>
    <?php include("includes/menu.php"); ?>

      <!--La Mezquita | Casco Historico | Los Patios | Medina Azahara | Contacto -->
    </nav>
    <main>
      <section>
          <?php 
          if (isset($_GET["page"])){
                if (($_GET["page"]=="index")) {
                    include("index.php"); 
                }
                if (($_GET["page"]=="mezquita")) {
                  include("pages/mezquita.php"); 
                } 
                if (($_GET["page"]=="cascohistorico")) {
                  include("pages/cascohistorico.php"); 
                }
                if (($_GET["page"]=="patios")) {
                  include("pages/patios.php"); 
                }
                if (($_GET["page"]=="medinaazahara")) {
                  include("pages/medinaazahara.php"); 
                }
                if (($_GET["page"]=="contacto")) {
                  include("pages/contacto.php"); 
                }
          }else {
            include("pages/home.php");
          }
          ?>        
      </section>
      <aside>
        Agenad
        Publicidad
      </aside>
    </main>
    <footer>
    <?php include("includes/footer.php"); ?>   
    </footer>
  </body>
</html>