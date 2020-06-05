<?php
echo "<form action=".$_SERVER['PHP_SELF']." method='post'>
Usted está logeado con perfil: ".$_SESSION['usuario']."
<td> ".($_SESSION['perfil'] != "invitado" ?  "<input type='submit' name='exit' value='Salir'>" : "" ) ."</td>
</form>";
?>