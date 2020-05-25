<?php
// Menu
if ($_SESSION['perfil'] == "admin") {
    echo '<nav>
<ul>
    <li><a href="index.php?page=adminLibros">Libros</a></li>
    <li><a href="index.php?page=adminPrestamos">Prestamos</a></li>
    <li><a href="index.php?page=adminUsuarios">Usuarios</a></li>
</ul>
</nav>';
}elseif ($_SESSION['perfil'] == "lector") {
    echo '<nav>
    <ul>
    <li><a href="index.php?page=lectorLibros">Libros</a></li>
    <li><a href="index.php?page=lectorPrestamos">Prestamos</a></li>
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
