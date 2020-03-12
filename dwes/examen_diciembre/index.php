<?php
/*
* Titulo: Examen Diciembre 2019
* Descripcion: Ejercicios del examen de Diciembre 2019 de Entorno Servidor
* Autor: Francisco Javier Frías Serrano
* Fecha: 10/12/2019
*/
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
include("config/parametros.php");
?>
<!DOCTYPE html>

<html lang="es">

	<head>
		<meta charset="utf-8">
		<meta name="author" content="Francisco Javier Frías Serrano">
    	<meta name="keywords" content="php,entorno,servidor,cordoba,grancapitan,daw,informatica">
		<meta name="description" content="Ejercicios Examen Diciembre Entorno Servidor">
		<link rel="stylesheet" href="css/normalize.css">
    	<link rel="stylesheet" href="css/style.css">
    	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    	<title><?php echo TITULO?></title>
	</head>
		<body>
		  <header>
		    <?php include("includes/cabecera.php") ?>
		  </header>
		  <nav>
			<?php include("includes/menu.php") ?>
		  </nav>
		<main>
			<section>
				<?php 
                if (isset($_GET["page"])){
                    if ($_GET["page"]=="home"){
                        include("pages/home.php");
                    }
                    if ($_GET["page"]=="ejercicio1"){
                        include("pages/ejercicio1.php");
					}
					if ($_GET["page"]=="ejercicio2"){
                        include("pages/ejercicio2.php");
					}
					if ($_GET["page"]=="administrador"){
                        include("pages/administrador.php");
					}
					if ($_GET["page"]=="cerrar"){
                        include("pages/logout.php");
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