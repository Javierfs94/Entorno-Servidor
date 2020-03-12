<?php
    require_once('clases/Usuario.php');
    
    if(isset($_POST['validar'])){
        if($_POST['email'] != '' && $_POST['username']!='' && $_POST['passwd'] != '' && $_POST['passwd2'] != '' ){
            if ($_POST['passwd']  ==  $_POST['passwd2'] && strlen($_POST['username']) <= 16 ) {
                $usuario = new Usuario();
                $usuario->set(array($_POST['username'],$_POST['passwd'], $_POST['email']));
                echo $usuario->mensaje;   
                header ("Location: index.php?page=register_new"); 
             }
             if (strlen($_POST['username']) > 16) {
                echo "El nombre excede los 16 carácteres"; 
             }
             if ($_POST['passwd']  !=  $_POST['passwd2']) {
                echo "Las contraseñas son distintas"; 
             }
             else {
                echo "No se enviaron los datos. Datos erróneos"; 
             }
        }
    }

?>
    
<form action="index.php?page=register" method="POST">
    Email: <input name="email" type="text"><br>
    Prefered username (max 16 chars): <input name="username" type="text"><br>
    Password: <input name="passwd" type="text"><br>
    Confirm Password: <input name="passwd2" type="text"><br>

    <input type="hidden" name="validar">
    <input type="submit" value="Crear usuario">
</form>