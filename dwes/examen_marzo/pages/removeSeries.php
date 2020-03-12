<?php
    
    function removeBookmarks($bk){
        require_once('../app/Usuario.php');
        $usuario = New Usuario();
        $usuario-> removeBk($_SESSION['user'], $bk);
    }
    
    session_start();
    if (!isset($_SESSION["logged"])) {
        $_SESSION["logged"] = false;
        $_SESSION["user"] = "invitado";
        header("Location: ../login.php");
    }
    
    if($_SESSION["logged"] && isset($_POST['bk'])){
        if(!empty($_POST['bk'])){
            removeBookmarks($_POST['bk']);
        }
        header("Location: ../index.php");
    }
    else {
        header("Location: ../login.php");
    }
?>