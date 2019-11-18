<?php
/**
 * Formulario para crear un currículum que incluya: Campos de texto, 
 * grupo de botones de opción, casilla de verificación, lista de selección única,
 * lista de selección múltiple, botón de validación, botón de imagen, botón de reset, etc.
 * 
 * @author Adrian Moya Moruno
 */    
function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

    
    //CONTROL:
    $msgErrorNombre = $claseErrorNombre = "";
    $msgErrorSexo = $claseErrorSexo = "";
    $procesaFormulario = false;
    $nombre = "";
    $sexo = "";
    $idiomas = [];
    $experiencia ="";
    $isCheckEspanol = "";
    $isCheckIngles = "";
    $isCheckItaliano = "";
    $isCheckAleman = "";
    $isCheckHombre = "";
    $isCheckMujer = "";
    $isSelectedSi = "";
    $isSelectedNo = "";

    if(isset($_POST["enviar"])){
        $procesaFormulario = true;
        $nombre = filtrado($_POST["nombre"]);
        if (empty($_POST["sexo"])){
            $procesaFormulario = false;
            $claseErrorSexo = "class=\"clase_error\"";
            $msgErrorSexo = "El campo sexo no puede estar vacío";
            //Comprueba si se ha marcado mujer o hombre
            if($sexo == "hombre"){
                $isCheckHombre = "checked=\"true\"";
            }
            else if ($sexo == "mujer"){
                $isCheckMujer = "checked=\"true\"";
            }
        }
        else{
            $sexo = $_POST["sexo"];
        }
        
        //Comprueba que tenga algun idioma marcado para recogerlo o no
        if (!empty($_POST["idiomas"])){
            $idiomas = $_POST["idiomas"];
            foreach ($idiomas as $idioma) {
                if($idioma == "español"){
                    $isCheckEspanol = "checked=\"true\"";
                }
                else if($idioma == "ingles"){
                    $isCheckIngles = "checked=\"true\"";
                }
                else if($idioma == "italiano"){
                    $isCheckItaliano = "checked=\"true\"";
                }
                else if($idioma == "aleman"){
                    $isCheckAleman = "checked=\"true\"";
                }
            }
        }
        $experiencia = $_POST["experiencia"];
        if ($experiencia = "si"){
            $isSelectedSi = "selected";
        }else if ($experiencia == "no"){
            $isSelectedNo = "selected";
        }

        if (empty($_POST["nombre"])){
            $procesaFormulario = false;
            $msgErrorNombre= "Error, has dejado el nombre en blanco.";
            $claseErrorNombre = "class=\"clase_error\"";
        }

    }
        
    
    
    
    
           

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo6.css">
    <title>Curriculum Vitae</title>
</head>
<body>
    <?php 

    //Muestra formulario
    
    echo "<form action=".htmlspecialchars($_SERVER["PHP_SELF"])." method=\"post\">
    <label>Nombre:</label><br/><input type=\"text\" name=\"nombre\" value=\"$nombre\"/><span $claseErrorNombre>$msgErrorNombre</span>
    <br/><label>Sexo:</label>
    <br/><input type=\"radio\" name=\"sexo\" value=\"hombre\" $isCheckHombre>Hombre</input><input type=\"radio\" name=\"sexo\" value=\"mujer\" $isCheckMujer >Mujer</input> <span $claseErrorSexo>$msgErrorSexo</span>
    <br/><label>Idiomas:</label>
    <br/><input type=\"checkbox\" name=\"idiomas[]\" value=\"español\" ".$isCheckEspanol.">Español</input><input type=\"checkbox\" name=\"idiomas[]\" value=\"ingles\" ".$isCheckIngles.">Inglés</input><input type=\"checkbox\" name=\"idiomas[]\" value=\"italiano\" ".$isCheckItaliano.">Italiano</input><input type=\"checkbox\" name=\"idiomas[]\" value=\"aleman\" ".$isCheckAleman.">Alemán</input>
    <br/><br/><label>¿Tiene experiencia laboral?</label><select name=\"experiencia\"><option value=\"no\" $isSelectedNo>No</option><option value=\"si\">Sí</option></select>
    <br/><br/><input type=\"reset\" value=\"Limpiar Formulario\"></input> <button type=\"submit\" name=\"enviar\">Enviar<img src=\"enviar.png\" width=\"40\" height=\"\"/></button> 
    </form>";
    
    //Procesar Formulario.
    if($procesaFormulario){
        echo "Su nombre es ".$nombre." ";
        echo "</br>Sexo: ".$sexo;
        
        if (!empty($idiomas)){
            echo "</br>Idiomas: ";
            for ($i=0; $i <count($idiomas) ; $i++) { 
                echo $idiomas[$i]."\t";
            }
        } 
        echo "</br>Experiencia laboral: ".$experiencia;
    }
    
    ?>
<footer>
<?php echo "<br/><a href="."../verCodigo.php?src=".str_replace("&bsol;","",__FILE__)."><button>Ver código</button></a>"; ?>
</footer>
</body>
</html>