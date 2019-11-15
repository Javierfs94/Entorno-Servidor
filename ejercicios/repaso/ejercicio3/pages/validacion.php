<?php
if(isset($_POST['usuario']) && isset($_POST['pass'])){
if ($_POST['usuario'] == '' || $_POST['pass'] == '') {
    header('Location:../index.php?error=1');
}
    elseif ($_POST['usuario'] == 'admin' && $_POST['pass'] == 'root' ) {
        header('Location:resultados.php');
    }else {
        header('Location:../index.php?error=1');    
    }
}
?>