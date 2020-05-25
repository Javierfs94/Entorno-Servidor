<?php

if ($_SESSION["perfil"] != "admin") {
    header("Location: index.php");
  }

echo "<p>PÁGINA DE PRESTAMOS DE ADMIN</p>"


?>