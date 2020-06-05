<?php
// Menu
if ($_SESSION['perfil'] == "admin") {
    echo '<nav>
<ul>
    <li><a href="index.php?page=adminUsuarios">Validación de Usuarios</a></li>
    <li><a href="index.php?page=adminClavesUsuarios">Descarga Claves Usuarios</a></li>
</ul>
</nav>';
}elseif ($_SESSION['perfil'] == "user") {
    echo '<nav>
<ul>
<li><a href="index.php?page=user">Gestión de Documentos</a></li>
</ul>
</nav>';
}else {
    echo '<nav>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="index.php?page=login">Login</a></li>
    <li><a href="index.php?page=register">Registrarse</a></li>
</ul>
</nav>';
}
?>    
