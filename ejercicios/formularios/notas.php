<?php
/**
* Formulario para validar el usuario y la nota.
*
* @author Francisco Javier Frías Serrano
 */
if (!isset($_POST['enviar'])) {
  echo "<form method='post' action=".htmlspecialchars($_SERVER['PHP_SELF']).">";
  echo "* Nombre: <input type='text' name='nombre' value=''><br>";
  echo "* Nota: <input type='text' name='nota' value=''><br>";
  echo "<p>Los campos con * son obligatorios</p>";
  echo "<a href="."notas.php><input type='submit' name='enviar'/></a></form>";
}
else { 
    if (empty($_POST['nombre']) || empty($_POST['nota']) || $_POST['nota'] < 1 || $_POST['nota'] > 10 ){
        echo "<form method='post' action=".htmlspecialchars($_SERVER['PHP_SELF']).">";
        if (empty($_POST['nombre'])) {
            echo "* Nombre: <input type='text' name='nombre' value=''><font color='red'> * El nombre es obligatorio</font><br>";
        }else {
            echo "* Nombre: <input type='text' name='nombre' value=".$_POST['nombre']." ><br>";
        }
  
        if (empty($_POST['nota'])) {
            echo "* Nota: <input type='text' name='nota' value=''><font color='red'> * La nota es obligatoria</font><br>";
        } elseif ($_POST['nota'] < 1 || $_POST['nota'] > 10) {
            echo "* Nota: <input type='text' name='nota' value=''><font color='red'> * El rango no es válido</font><br>";
        } else {
            echo "* Nota: <input type='text' name='nota' value=".$_POST['nota']." ><br>";
        }
            echo "<a href="."notas.php><input type='submit' name='enviar'/></a></form>";
    }else{
        echo "El formulario se ha enviado correctamente. Sus datos son: <br> Nombre: ".$_POST['nombre']." <br> Nota: ".$_POST['nota']."";
        }
    }

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";
?>