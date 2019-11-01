<?php
//Capa de control
if (!isset($_POST['enviar'])){
    header('Location: index.php');
}
$user = ($_POST['user']);
$pass = ($_POST['pass']);


if ($user =="" && $pass=="") {
    header('Location: index.php');
} 
else {
   if (isset($_POST['remember'])) {
    setcookie("user",$user,time() + 60);
    setcookie("pass",$pass,time() + 60);
   }

    if (isset($user) && isset($pass)) {
    
        if (($user == 'usuario') && ($pass == '1234')) {    
            echo '¡Login exitoso!<br>';  
            setcookie("user",$_POST['user']);
            setcookie("pass",$_POST['pass']);
         } else {
            echo 'Usuario o pass no válido<br>';
        }
      
    
    } 

}



?>