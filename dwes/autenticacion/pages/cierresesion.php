<?php
session_start();

if($_SESSION["aut"]){
    session_destroy();
    header("Location: index.php");
}else{
    header("Location: index.php");
}

?>