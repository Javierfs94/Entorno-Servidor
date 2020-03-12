<?php
/*
* Titulo: EjercicioDNI
* Descripcion: Escribe una función que reciba nombre y apellidos en una cadena y devuelva las iniciales. 
* Utiliza la función en un script.
* Autor: Francisco Javier Frías Serrano
*/
?>


<?php


    /**
     * Divido la cadena en 1 en 1 y trunqueo el cada campo
     */
    function devolverIniciales($nombre, $apellido1, $apellido2) {
        $partesNombre = explode(" ", trim($nombre));
        $partesAp1 = explode(" ", trim($apellido1));
        $partesAp2 = explode(" ", trim($apellido2));

        return $iniciales = obtenerIniciales($partesNombre) . obtenerIniciales($partesAp1) . obtenerIniciales($partesAp2);
    }


    $error = false;
    $nombreErr = $apellido1Err = $apellido2Err = "";

    $nombre = $apellido1 = $apellido2 = "";

    /**
     * Si le doy a enviar, valido los datos
     */
    if (isset($_POST['enviar'])) {
        //Control nombre vacio
        if (empty($_POST['nombre'])) {
            $nombreErr = "Campo requerido";
            $error = true;
        } else {
            //preg match expresion regular,vÃ¡lido
            $nombre = $_POST['nombre'];
            if(!preg_match("/^[a-zA-Z\s]*$/",$nombre)) {
                $nombreErr = "SÃ³lo se permiten letras";
                $error = true;
            }
        }
        //control apellido vacio
        if (empty($_POST['apellido1'])) {
            $apellido1Err = "Campo requerido";
            $error = true;
        } else {
            //preg match expresion regular,vÃ¡lido
            $apellido1 = $_POST['apellido1'];
            if(!preg_match("/^[a-zA-Z\s]*$/",$apellido1)) {
                $apellido1Err = "SÃ³lo se permiten letras";
                $error = true;
            }
        }
        //Control apellido2 vacio
        if (empty($_POST['apellido2'])) {
            $apellido2Err = "Campo requerido";
            $error = true;
        } else {
            //preg match expresion regular,vÃ¡lido
            $apellido2 = $_POST['apellido2'];
            if(!preg_match("/^[a-zA-Z\s]*$/",$apellido2)) {
                $apellido2Err = "SÃ³lo se permiten letras";
                $error = true;
            }
        }
    }
    /**
     * Creo el formulario con cada value
     * correspondiente por caso para devolver siempre el valor.
     */
    echo "<h2>Obtener iniciales de nombre y apellidos</h2>";
    echo "<div>";
    //Nombre
    //Apellido1
    //Apellido2
    echo "<form method=\"post\" action=\"" . htmlspecialchars($_SERVER['PHP_SELF']) . "\">
            Nombre: <input type=\"text\"  name=\"nombre\"   value = $nombre >
            <span style='color: red;'>* " . $nombreErr . "</span>
            <br /><br />
            Primer apellido: <input type=\"text\" name=\"apellido1\"  value = $apellido1 >
            <span style='color: red;'>* " . $apellido1Err . "</span>
            <br /><br />
            Segundo apellido: <input type=\"text\"  name=\"apellido2\" value = $apellido2 >
            <span style='color: red;'>* " . $apellido2Err . "</span>
            <br /><br />
            <input type=\"submit\" name=\"enviar\" value=\"Enviar\" />
        </form>";
    echo "</div>";
    
    /**
     * Si le doy enviar y no hay errores, devuelvo iniciales con los metodos correspondientes.
     */
    if (isset($_POST['enviar']) && !$error) {
        $iniciales = devolverIniciales($_POST['nombre'], $_POST['apellido1'], $_POST['apellido2']);
        echo "<br /><p class=\"mensaje\">Iniciales: <strong>" . $iniciales . "</strong></p>";
    }

    /**
     * Obtengo las iniciales y las devuelvo en mayÃºsculas
     */
    function obtenerIniciales($cadena) {
        $iniciales = "";
        $arr = array("","");
        for ($i=0; $i < count($cadena); $i++) {
            if (in_array($cadena[$i],$arr)) {
                $iniciales .= $cadena[$i] . ". ";
            } else {
                //Las convierto en mayÃºsculas
                $iniciales .= substr(strtoupper($cadena[$i]),0,1) . ". ";
            }  
        }
        return $iniciales;
    }

?>

<?php
    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
    <a href="../../../"><button>Volver</button></a>