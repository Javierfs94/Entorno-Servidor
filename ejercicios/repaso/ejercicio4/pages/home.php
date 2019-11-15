<?php

echo '<form action="pages/validacion.php" method="post">
        Nombre: <input type="text" name="usuario" value=""> <br>
        Pass: <input type="password" name="pass" value=""> <br>

       <input type="radio" name="genero" value="hombre" checked> Hombre<br>
        <input type="radio" name="genero" value="mujer"> Mujer<br>
        <input type="radio" name="genero" value="otro"> Otro <br>

        <input type="checkbox" name="idioma1" value="español"> Español<br>
        <input type="checkbox" name="idioma2" value="ingles"> Inglés <br>
        <input type="checkbox" name="idioma3" value="frances"> Francés <br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar datos">

    </form>';
?>

