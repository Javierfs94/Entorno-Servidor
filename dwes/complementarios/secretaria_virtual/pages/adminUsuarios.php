<?php

require "phpmailer/class.phpmailer.php";

if ($_SESSION["perfil"] != "admin") {
  header("Location: index.php");
}

if (isset($_POST["validar"])) {
  if (isset($_POST['formValidate'])) {
    $checks = $_POST['formValidate'];
    if (!empty($checks)) {
      $N = count($checks);
      for($i = 0; $i < $N; $i++){
          $_SESSION["user"]->activar($checks[$i]);
          $array = $_SESSION["user"]->getDatos($checks[$i]);

        if (!file_exists("./users/".$array[0]["usuario"])) {
          mkdir("./users/".$array[0]["usuario"], 0777, true);
        }
  
        $clave = array();
        $letras = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h');

        $salida = fopen("./users/".$array[0]["usuario"]."/claves.txt","w");
        fwrite($salida, " ");

        for ($cabecera = 1; $cabecera < 9; $cabecera++) { 
            $linea = "   ".  $cabecera;
            fwrite($salida, $linea);
        }
        for($i = 0; $i < 8; $i++){
            array_push($clave, array());
            $lineaLetras = "\n".$letras[$i];
            fwrite($salida,  $lineaLetras);
          for($j = 0; $j < 8; $j++){
            array_push($clave[$i], rand(0, 999));
            $lineaValores = " ".$clave[$i][$j];
            fwrite($salida, $lineaValores);
            }
        }

        for ($i=0; $i < 8; $i++) { 
          for ($j=0; $j < 8; $j++) { 
            $_SESSION["claveFirma"]->set($array[0]["id"], $i+1, $j+1, $clave[$i][$j]);
          }
        }

        fclose($salida);
        
        $mail = new PHPMailer();
  
        $mail->CharSet = "utf-8";
        $mail->From = "javifs94developer@gmail.com";
        $mail->FromName = "Administrador Secretaría Virtual";
        $mail->Subject = "Usuario validado correctamente";
  
        $mail->addAddress($array[0]["email"],"");
        $mail->msgHTML("Su usuario ".$array[0]["usuario"]." ha sido validado correctamente");
  
        if ($mail->send()) {
            echo "<p>Correos de validación mandados</p>";
        } else {
            echo "<p>No se pudieron mandar los correos</p>";
        }
  
      }
    }
  }else{
    echo "<p>Pulse en algún usuario al que validar</p>";
  }
}

if (isset($_GET["bloquear"])) {
  $_SESSION["user"]->bloquear($_GET["bloquear"]);
}


echo "<p>Listado de Usuarios pendientes de validación</p>";
$usuarios = $_SESSION["user"]->mostrarUsuariosPendientes();

echo "<table>
<tr>
<th>Usuario</th>
<th>Estado</th>
<th>Validación</th>
</tr>
";
echo "<form method='post' action=".$_SERVER["PHP_SELF"]."?page=adminUsuarios>";
  foreach ($usuarios as $key) {
    echo "<tr>
    <td>".$key["usuario"]."</td>
    <td>".$key["estado"]."</td>
    <td>
    <input type='checkbox' name='formValidate[]' value=".$key["id"].">
    </td>
    </tr>"; 
  }
  echo "<p>
  <input type='reset'  value='Cancelar'/>
  <input type='submit' name='validar' value='Enviar'/></p> 
  </form>
  ";  
  echo "</table>";

?>