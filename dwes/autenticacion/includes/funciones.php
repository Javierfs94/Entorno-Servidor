<?php

function login($user, $pass){
    include "arrays.php";
    $indiceClave = array_search($user, array_column($usuarios, "user"));
    if ($user == $usuarios[$indiceClave]["user"] and $pass == $usuarios[$indiceClave]["psw"]){
        return true;
        
    }else{
        return false;
    }

}

function limpiaCampo($campo)
{
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}

?>