<?php

if ($_SESSION["perfil"] != "lector") {
    header("Location: index.php");
}

if (isset($_GET["reservar"])) {
    $date = date("Y/m/d");
    $datos = array(
        'id_usuario' => $_SESSION["idUser"],
        'id_libro' => $_GET["reservar"],
        'prestado' => $date
    );

    $_SESSION["prestamo"]->set($datos);
    $_SESSION["libro"]->reservarLibro($_GET["reservar"]);
    header("Location: index.php?page=lectorLibros");
}

if (isset($_GET["devolver"])) {
    $_SESSION["libro"]->devolverLibro($_GET["devolver"]);
    header("Location: index.php?page=lectorLibros");
}


function imprimeLibroLector($resultados){
    echo "<h2>Libros encontrados</h2>";
    echo "<table>";
        echo "<tr><th>Título</th><th>Autor</th><th>Editorial</th></tr>";
            foreach ($resultados as $libro) {
                echo "<tr>";
                    echo "<td>".$libro['titulo']."</td>";
                    echo "<td>".$libro['autor']."</td>"; 
                    echo "<td>".$libro['editorial']."</td>"; 
                echo "</tr>";
            }
    echo "</table>";
}


if ($_SESSION["estado"] == "activado") {

    echo "<form action=".$_SERVER['PHP_SELF']."?page=lectorLibros"." method=\"post\">
            Buscar: <input type='text' name='busqueda'>
            <input type='submit' value='Buscar' name='buscar'>
        </form>";



    if (isset($_POST['buscar'])){
        imprimeLibroLector($_SESSION["libro"]->buscarLibro($_POST["busqueda"]));
    }


    echo "<p>Listado de Libros</p>";
    $libros = $_SESSION["libro"]->mostrarLibros();
    
    echo "<table>
    <tr>
    <th>ID</th>
    <th>Titulo</th>
    <th>Autor</th>
    <th>Editorial</th>
    <th>Reservar</th>
    <th>Devolver</th>
    </tr>
    ";
      foreach ($libros as $key) {
        echo "<tr>
        <td>".$key["id"]."</td>
        <td>".$key["titulo"]."</td>
        <td>".$key["autor"]."</td>
        <td>".$key["editorial"]."</td>
        <td> ".($key["estado"] == "disponible" ?  "<button id='botonReservar'><a href="."index.php?page=lectorLibros&reservar=".$key['id'].">Reservar</a></button>" : "Reservado" ) ."</td>
        <td> ".($key["estado"] == "reservado" ?  "<button id='botonDevolver'><a href="."index.php?page=lectorLibros&devolver=".$key['id'].">Devolver</a></button>" : "Disponible" ) ."</td>
        </tr>";
      }  
      echo "</table>";


}


if ($_SESSION["estado"] == "bloqueado") {
    echo "<p>Ha sido bloqueado por el consejo supremo</p>";
}




?>