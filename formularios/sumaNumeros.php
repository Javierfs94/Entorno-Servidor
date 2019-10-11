<?php
/**
* Script para sumar una serie de números. El número de números a sumar será introducido en un formulario.
*
* @author Francisco Javier Frías Serrano
 */
if (isset($_GET['codigo'])) {
    highlight_file(__FILE__);
    exit;
}
?>
<?php include 'top.php'?>
<h2>Suma de nÃºmeros</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    Â¿CuÃ¡ntos nÃºmeros desea?: <input type="number" name="cantidadNumeros" min='2'
        value="<?php echo $vCantidadNumeros ?>"><span class="errMsg" style='color: red'>*</span>
    <br><br>
    <input type="submit" name="enviar" value="Submit">
</form>

<?php
      echo "<form method='post' action=''>";
      $bandera = false;
      $cantidadNumeros = "";
      $suma = 0;
     
      $errNumero = "NÃºmero errÃ³neo";
  
      if (isset($_POST["enviar"])) {
          if ($_POST["cantidadNumeros"] <= 0) {
              $bandera = true;
          } else {
              
              $cantidadNumeros = $_POST["cantidadNumeros"];
              echo "<br><br>";
              for ($i = 0; $i < $cantidadNumeros; $i++) {
                  echo "<br><br>NÃºmero " . ($i + 1) . "<input type='number' required='required' name='numeros[]'>
                  <span  style=\"color:red\">* <?php echo $errNumero;?></span>";
}

echo "<br><br><input type='submit' name='sumar' value='Submit'>";
}
}
if (isset($_POST["sumar"])) {
$sumandos = $_POST["numeros"];

for ($j = 0; $j < count($sumandos); $j++) { $suma=$suma + $sumandos[$j]; } echo "La suma es: " . $suma . "<br><br>" ; }
    echo "</form>" ; echo "<br/><a href='../verCodigo.php?src=" .__FILE__."'><button>Ver Codigo</button></a>";
    ?>
    <a href="../../"><button>Volver</button></a>
    ?>