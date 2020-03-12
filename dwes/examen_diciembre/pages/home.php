<?php
include("includes/funciones.php");
session_start();
if (!isset($_SESSION["aut"])){
	$_SESSION["aut"] = false;
    $_SESSION["nombre"] ="Invitado";
    $_SESSION["user"] = "Invitado";
	$_SESSION["perfil"] = "Invitado";
}

$usuario="";
$psw="";
$msgErrorUsuario="";
$msgErrorPass="";
$msgErrorLogin="";
$lprocesaFormulario=false;

if(isset($_POST["submit"])){
    $usuario = limpiaCampo($_POST["user"]);
    $psw =limpiaCampo($_POST["pass"]);

    if(empty($usuario)){
        $msgErrorUsuario=" El usuario no puede estar vacío";
    }

    if(empty($psw)){
        $msgErrorPass= " La contraseña no puede estar vacía";
    }
    $lprocesaFormulario=true;
}

if($lprocesaFormulario){
    if(login($usuario,$psw)){
        include "arrays.php";
        $_SESSION['aut'] = true;
        $_SESSION['user'] = $usuario;
        $indiceClave = array_search($usuario, array_column($usuarios, "user"));

        $_SESSION['perfil'] = $usuarios[$indiceClave]["perfil"];
        $_SESSION["nombre"] = $usuarios[$indiceClave]["nombre"];
    }else{
        $msgErrorLogin = "Usuario o contraseña incorrectos";
    }
}

if ($_SESSION["aut"]) {
    echo "<h1>Bienvenido al inicio</h1>";
} else {
    echo "<form action='" .htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
    echo "<br>";
    echo "Usuario: ";
    echo "<br/>";
    echo "<input type='text' name='user' value='" . $usuario . "'><span>".$msgErrorUsuario."</span>";
    echo "<br/>";
    echo "<br/>";

    echo "Contraseña: ";
    echo "<br/>";
    echo "<input type='text' name='pass'><span>".$msgErrorPass."</span>";
    echo "<br/>";
    echo "<br>";
    echo "<input type='submit' name='submit' value='Iniciar sesión'><br>";
    echo "<span>".$msgErrorLogin."</span>";
    echo "</form>";
}

?>