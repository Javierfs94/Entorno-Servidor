<?php
// Bloque de documentación: titulo, descripcion, autor, fecha
/*
* Descripcion
*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio Suma de números</title>
</head>

<body>
    <h2>Suma de números</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        ¿Cuántos números desea?: <input type="number" name="cantidadNumeros" min='2'
            value="<?php echo $vCantidadNumeros ?>"><span class="errMsg" style='color: red'>*</span>
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
      echo "<form method='post' action=''>";
      $bandera = false;
      $cantidadNumeros = "";
      $suma = 0;     
      $errNumero = "Número erróneo";
  
      if (isset($_POST["enviar"])) {
          if ($_POST["cantidadNumeros"] <= 0) {
              $bandera = true;        
            } else {
              $cantidadNumeros = $_POST["cantidadNumeros"];
              echo "<br>";
              for ($i = 0; $i < $cantidadNumeros; $i++) {
                  echo "<br>Número " . ($i + 1) . "<input type='number' required='required' name='numeros[]'>
                  <span  style=\"color:red\">* <?php echo $errNumero;?></span>";
    }

    echo "<br><input type='submit' name='sumar' value='Enviar'>";
    }
    }
    
    if (isset($_POST["sumar"])) {
    $sumandos = $_POST["numeros"];

    for ($j = 0; $j < count($sumandos); $j++) { $suma+= $sumandos[$j]; } echo "La suma es: " . $suma . "<br>" ; }
        echo "</form>" ; echo "<br/><a href='../../verCodigo.php?src=" .__FILE__."'><button>Ver Codigo</button></a>";
        ?>
        <a href="../../../"><button>Volver</button></a>

</body>

</html>