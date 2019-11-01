<?php
/*
* Titulo: Sesión cookies
* Descripcion: Sesión de usuario que vuelva a pedirlo mediante cookies
* Autor: Francisco Javier Frías Serrano
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio Cookies</title>
</head>
<body>

<h2>Formulario login</h2>

<form action="validacion.php" name="login" method="post" >
   Usuario: <input type="text" name="user" value="<?php if (isset($_COOKIE['user']))echo $_COOKIE['user']; ?>"><br>
   Pass: <input type="password" name="pass" value="<?php if (isset($_COOKIE['pass'])) echo $_COOKIE['pass']; ?>"><br><br>
   Recordar: <input type="checkbox" name="remember">
   <input type="hidden" name="enviar">
   <input type="submit" name="submit" value="Entrar">

</form>

  
<?php
echo "<a href='../../verCodigo.php?src=".__FILE__."' ><button>Ver Codigo</button></a>";
?>
<a href="../../../"><button>Volver</button></a>

</body>
</html>



