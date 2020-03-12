<?php

$datos=["Nombre","Apellidos","Direccion","Provincia","Telefono"];

echo "<form method='post' action='mostrarFormulario.php'>";
for ($i=0; $i<sizeof($datos); $i++) { 
    echo "$datos[$i]:";
    echo "<input type='text' name='$datos[$i]' value=''/><br/>";
}
echo "Contraseña: <input type='password' name='Contrasenna' value=''/><br/>";

echo "<br/>¿Tienes trabajo?<br/>";
echo "<input type='radio' name='trabajo' value='Si' checked>Sí<br/>";
echo "<input type='radio' name='trabajo' value='No'>No<br/>";

echo "<br/><label for='estudios'>Estudios:</label><br/>";
echo "<select id='estudios' name='estudios'>";
echo "<option value='0' selected='selected'>Ninguno</option>";
echo "<option value='1'>Primaria</option>";
echo "<option value='2'>ESO</option>";
echo "<option value='3'>Bachillerato</option>";
echo "<option value='4'>Universitaria</option>";
echo "</select><br/>";

echo "<br/>Nivel de inglés:<br/>";
echo "<input type='radio' name='ingles' value='Ninguna'>Sin titulación<br/>";
echo "<input type='radio' name='ingles' value='A1'>A1<br/>";
echo "<input type='radio' name='ingles' value='A2'>A2<br/>";
echo "<input type='radio' name='ingles' value='B1'>B1<br/>";
echo "<input type='radio' name='ingles' value='B2'>B2<br/>";
echo "<input type='radio' name='ingles' value='C1'>C1<br/>";
echo "<input type='radio' name='ingles' value='C2'>C2<br/>";

echo "<br/>Temas de su interés:<br/>";
echo "<input type='checkbox' name='ocio[]' value='Deporte'>Deporte<br/>";
echo "<input type='checkbox' name='ocio[]' value='Lectura'>Lectura<br/>";
echo "<input type='checkbox' name='ocio[]' value='Cine'>Cine<br/>";
echo "<input type='checkbox' name='ocio[]' value='Videojuegos'>Videojuegos<br/>";
echo "<input type='checkbox' name='ocio[]' value='Informática'>Informática<br/>";

echo "<a href="."mostrarFormulario.php><input type='submit' name='enviar'/></a>";
echo "</form>";

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
   <a href="../../../"><button>Volver</button></a>
