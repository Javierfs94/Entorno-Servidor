<?php
// Menu
if ($_SESSION['perfil'] == "admin") {
    echo '<nav>
<ul>
    <li><a href="index.php?page=adminSeries">Gestión de Series</a></li>
    <li><a href="index.php?page=adminClavesUsuarios">Gestión de Encuestas</a></li>
</ul>
</nav>';
}elseif ($_SESSION['perfil'] == "rol1") {
    echo '<nav>
<ul>
<li><a href="index.php?page=user">Mis series</a></li>
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
