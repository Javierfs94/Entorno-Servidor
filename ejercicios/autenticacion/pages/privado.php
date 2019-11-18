<?php
// Capa de control
session_start();

if (!$_SESSION['logged']) {
    header('Location:index.php?error=1');
}

// Superada capa de control
echo "Zona privada";
?>