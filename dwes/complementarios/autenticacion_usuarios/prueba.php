<?php
$usuario = "user2";
$pass = "user2";
$fp = fopen("usuarios.txt", "r");
while ($linea = fgets($fp)) {
  $lineaSeparada = preg_split('/\s+/', $linea);
  if ($usuario==$lineaSeparada[0] && $pass=$lineaSeparada[1]) {
      echo "COINCIDENCIA";
  break;
  }
}
fclose($fp);

?> 