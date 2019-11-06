<?php
session_start();

$_SESSION["nombre"] = "Pepito Conejo";
print "<p>El nombre es $_SESSION[nombre]</p>";


$fecha = "";
$tarea = "";

$tareas = array('' => , );

//Declaracion de la variable sesion
if (!isset($_SESSION['tareas'])) {
    $_SESSION['tareas'] = array();
}


?>

<h2>Formulario login</h2>

<form action="validacion.php" name="login" method="post" >
   Fecha: <input type="text" name="user" value="<?php if echo $_COOKIE['user']; ?>"><br>
   Tarea: <input type="text" name="pass" value="<?php if echo $_COOKIE['pass']; ?>"><br><br>
   <input type="hidden" name="enviar">
   <input type="submit" name="submit" value="Entrar">

</form>

<?php

?>

<?php
echo "<a href='../../verCodigo.php?src=".__FILE__."' ><button>Ver Codigo</button></a>";
?>
<a href="../../../"><button>Volver</button></a>