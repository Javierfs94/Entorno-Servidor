<?php
echo "<form action=".$_SERVER['PHP_SELF']." method='post'>
Usted está logeado como: ".($_SESSION['perfil'] != "rol1" && $_SESSION['perfil'] != "admin" ?  "Invitado" : $_SESSION["usuario"])."
<td>".($_SESSION['perfil'] != "rol1" && $_SESSION['perfil'] != "admin" ?  "" : "<input type='submit' name='exit' value='Salir'>" )."</td>
</form>";
?>