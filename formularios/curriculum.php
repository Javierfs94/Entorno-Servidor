<?php
/**
* Formulario para un currículum que incluya: Campos de texto, grupo de botones de opción,
* casilla de verificación, lista de selección única, lista de selección múltiple, botón de validación,
* botón de imagen, botón de reset.
*
* @author Francisco Javier Frías Serrano
 */
if (isset($_GET['codigo'])) {
    highlight_file(__FILE__);
    exit;
}

error_reporting(5);

if (isset($_POST['enviar'])) {

    
    $vNombre = $_POST['name'];
    $vApellidos = $_POST['apellido'];
    $vSexo = $_POST['sexo'];
    $vMoto = $_POST['moto'];
    $vCoche = $_POST['coche'];
    $vArea = $_POST['area'];
    $vPais = $_POST['pais'];
    $vIngles = $_POST['ingles'];
    $vFrances = $_POST['frances'];
    $vAleman = $_POST['aleman'];
    $vEmail = $_POST['correo'];
    $arrayPais = array("España", "Alemania", "Francia", "Portugal");


    $lcolocaFormulario = false;
    $msgErrorNombre = $msgErrorApellido = $msgErrorSexo = $msgErrorPais  = $msgErrorEmail = '';

    if (empty($vNombre)) {
        $msgErrorNombre = "Nombre requerido";
        $lcolocaFormulario = true;
    }
    if (empty($vApellidos)) {
        $msgErrorApellido = "Apellido requerido";
        $lcolocaFormulario = true;
    }
    if (empty($vSexo)) {
        $msgErrorSexo = "Sexo requerido";
        $lcolocaFormulario = true;
    }
    if (empty($vPais)) {
        $msgErrorPais = "Paí­s requerido";
        $lcolocaFormulario = true;
    }
    if (empty($vEmail)) {
        $msgErrorEmail = "El email es requerido";
        $lcolocaFormulario = true;
    }

}   //No enviar, variables vacias
else {
    $vNombre = '';
    $vApellidos = '';
    $vSexo = '';
    $vMoto = '';
    $vCoche = '';
    $vIngles = '';
    $vFrances = '';
    $vAleman = '';
    $vEmail = '';
    $vPais = '';
}

?>

<h2>Curriculum</h2>

<?php if (!isset($_POST['enviar']) or $lcolocaFormulario) { ?>
<h3>Formulario</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <b style=color:red>Campos obligatorios * </b><br>
    Nombre: <input type="text" name="name" size="20" value="<?php echo $vNombre ?>">
    <b style=color:red>*</b>

    <?php echo "<span style=\"color:red\">$msgErrorNombre</span>" ?>
    <br>

    Apellidos: <input type="text" name="apellido" size="15" value="<?php echo $vApellidos ?>">
    <b style=color:red>*</b>
    <?php echo "<span style=\"color:red\">$msgErrorApellido</span>" ?><br>
    <br>
    <label for="">Sexo</label>
    <b style=color:red>*</b>
    <?php echo "<span style=\"color:red\">$msgErrorSexo</span>" ?><br>
    <input type="radio" name="sexo" value="Hombre" <?php echo $vSexo == "Hombre" ? "checked" : ""; ?>> Hombre<br>
    <input type="radio" name="sexo" value="Mujer" <?php echo $vSexo == "Mujer" ? "checked" : ""; ?>> Mujer<br><br>


    <label for="">Vehí­culo</label><br>
    <input type="checkbox" name="moto" value="Moto" <?php echo $vMoto == "Moto" ? "checked" : ""; ?>>Moto<br>
    <input type="checkbox" name="coche" value="Coche" <?php echo $vCoche == "Coche" ? "checked" : ""; ?>>Coche<br>
    <br>

    <label for="">Idiomas</label><br>
    <input type="checkbox" name="ingles" value="Ingles" <?php echo $vIngles == "Ingles" ? "checked" : ""; ?>>Inglés<br>
    <input type="checkbox" name="frances" value="Frances"
        <?php echo $vFrances == "Frances" ? "checked" : ""; ?>>Frances<br>
    <input type="checkbox" name="aleman" value="Aleman" <?php echo $vAleman == "Aleman" ? "checked" : ""; ?>>Alemán<br>

    <br>

    <label for="">País</label>

    <select name="pais" value="<?php echo $vPais ?>">
        <option <?php echo $vPais=='EspaÃ±a'?'selected':''; ?>> España</option>
        <option <?php echo $vPais=='Alemania'?'selected':''; ?>>Alemania</option>
        <option <?php echo $vPais=='Francia'?'selected':''; ?>>Francia</option>
        <option <?php echo $vPais=='Portugal'?'selected':''; ?>>Portugal</option>
    </select>

    <br><br>

    Datos de interés: <br>
    <textarea rows="4" cols="50" name="area" value="<?php echo $vArea ?>">
    </textarea><br>

    Email: <input type="email" name="correo" size="30" value="<?php echo $vEmail ?>">
    <b style=color:red>*</b>
    <?php echo "<span style=\"color:red\">$msgErrorEmail</span>" ?><br>

    <p><input type="submit" value="Enviar" name="enviar"></p>

    <br>

</form>

<?php 
    } else {
        //$name = $_POST['name'];
        echo "Nombre:" . $vNombre;
        echo '<br/>';
        //$apellido = $_POST['apellido'];
        echo "Apellidos: " . $vApellidos;
        echo '<br/>';
        echo "Sexo: " . $vSexo;
        echo '<br/>';
        echo "Vehí­culo: " .$vMoto . " "  . $vCoche ;
        echo '<br/>';
        echo "Datos de interés: " . $vArea;
        echo '<br/>';
        echo "País seleccionado: " . $vPais;
        echo '<br/>';
        echo "Idiomas: " . $vIngles . " " . $vFrances . " " . $vAleman;
        echo '<br/>';
        echo "Correo electrónico: " . $vEmail;
        echo '<br/>';
    }

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";
?>
<a href="../../"><button>Volver</button></a>