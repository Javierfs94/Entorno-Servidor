<?php

echo '<form action="pages/resultados.php" method="post">
        Nombre: <input type="text" name="nombre" value=""> 
        
        <br><br>

        <input type="radio" name="genero" value="hombre" checked> Hombre<br>
        <input type="radio" name="genero" value="mujer"> Mujer

        <br><br>

        <input type="checkbox" name=\"idiomas[]\" value=\"español\"> Español<br>
        <input type="checkbox" name=\"idiomas[]\" value=\"ingles\"> Inglés <br>
        <input type="checkbox" name=\"idiomas[]\" value=\"frances\"> Francés 
        
        <br><br>

        Edad <select name="edad">
        <option value="1">Menor 18</option>
        <option value="2">Mayor 18</option>
        </select>
        
        <br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar datos">
  
    </form>';
?>

