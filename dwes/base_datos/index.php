<?php
/*
* Titulo: 
* Descripcion: 
* Autor:
* Fecha: 
*/
?>
<?php
    include("config/parametros.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Francisco Javier Frías Serrano">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo TITULO; ?></title>
</head>

<body>
    <?php
    include("includes/cabecera.php");
?>


<form action="index.php" method="post">
        Añadir alumno
        <br>
        Nombre: <input type="text" name="nombre">
        <br>
        Apellidos: <input type="text" name="apellidos">
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <br>
    <form action="index.php" method="post">
        Nombre a buscar: <input type="text" name="busqueda">
        <br>
        <input type="submit" name="buscar" value="Enviar">
    </form>

    <br>
    <?php

        define("USUARIO","tutoria");
        define("CONTRASEÑA","tutoria");

        function error($limpiar){
            $error = trim($limpiar);
            $error = stripslashes($limpiar);
            $error =  htmlspecialchars($limpiar);
            return $error;
        }

        function conectaDB(){
            try{
                $db = new PDO('mysql:host=localhost;dbname=tutoria;charset=utf8',USUARIO,CONTRASEÑA);
                $db -> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);

                return ($db);
            }
            catch(PDOException $e){
                echo "Error";
                exit();
            }
        }

        if(isset($_POST['nombre']) && isset($_POST['apellidos'])){
            $db = conectaDB();
            $nombre = error($_POST['nombre']);
            $apellidos = error($_POST['apellidos']);
        
            $consulta = 'INSERT INTO alumnos (nombre,apellidos)
                        VALUES (?,?)';
    
            $result = $db -> prepare($consulta);
            $result -> execute(array($nombre,$apellidos));
        
            if($result){
                echo "Registro Creado Correctamente.";
                echo "<br>";
            }
            else{
                echo "No se ha creado la consulta correctamente.";
                echo "<br>";
            }
        }

        $db = conectaDB();
        $sql = 'SELECT * FROM alumnos';
        $consulta = $db -> query($sql);
        $mostrarListado = $consulta -> fetchAll();

        if(isset($_GET["eliminar"])){
            $db = conectaDB();

            $consulta = "DELETE FROM alumnos where id=?";
            $result = $db -> prepare($consulta);
            $result -> execute(array($_GET['eliminar']));
    
            if($result){
                echo "Registro Eliminado Correctamente.";
                echo "<br>";
            }
        }

        echo "<br>";
        echo "Alumnos en la base de datos: <br>";
        foreach($mostrarListado as $value){
            echo $value['nombre']." ";
            echo $value['apellidos']."<button><a href='index.php?eliminar=".$value["id"]."'>Eliminar</a></button><br>";
        }
        echo"<br>";
        
        if(isset($_POST["buscar"])){
            $db = conectaDB();

            $sql2 = "SELECT * FROM alumnos WHERE (nombre LIKE \""."%".$_POST['busqueda']."%"."\")";
            $consulta2 = $db -> query($sql2);
            $busqueda = $consulta2 -> fetchAll();

            echo "Buscando por nombre: <br>";
            foreach($busqueda as $value){
                echo $value['nombre']." ";
                echo $value['apellidos']."<br>";
            }
        }
    ?>


    <?php
        include("includes/footer.php");
    ?>
</body>

</html>