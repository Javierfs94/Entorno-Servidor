<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
include("config/parametros.php");
?>
<!DOCTYPE html>

<html lang="es">

	<head>
		<title><?php echo $titulo?></title>
		<meta charset="utf-8">
		<meta name="author" content="Francisco Javier Frías Serrano">
    	<meta name="keywords" content="php,entorno,servidor,cordoba,grancapitan,daw,informatica">
		<meta name="description" content="Ejercicio básico de autenticacion">
		<link rel="stylesheet" type="text/css"  href="css/style.css">
	</head>
		<body>
		  <header>
		    <?php include("includes/cabecera.php") ?>
		  </header>
		  <nav>
			  <?php 
			  include("includes/menu.php") ?>
		  </nav>
		<main>
			<section>
				<?php 

                if (isset($_GET["page"])){
                    if ($_GET["page"]=="home"){
                        include("pages/home.php");
                    }
                    if ($_GET["page"]=="alumno"){
                        include("pages/alumno.php");
					}
					if ($_GET["page"]=="profesor"){
                        include("pages/profesor.php");
					}
					if ($_GET["page"]=="administrador"){
                        include("pages/administrador.php");
					}
					if ($_GET["page"]=="cerrar"){
                        include("pages/cierresesion.php");
					}
                }else{
					include("pages/home.php");
				}
				echo "<br>";
				echo "Su nombre es <strong>". $_SESSION["nombre"]."</strong>";
				echo "<br>";
				echo "Su perfil es <strong>". $_SESSION["perfil"]."</strong>";
                
                ?>			
			</section>
		</main>
		<footer>
		  <?php include("includes/footer.php") ?>
            
        </footer>
	   </body>
</html>