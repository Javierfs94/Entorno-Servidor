<?php
/*
* Titulo: Ejercicios de repaso 2
* Descripcion: 
* 1. Crea una función para pasar un número en notación romana a notación arábiga. Prueba la función con los siguientes valores:
* LXXXVI (86), CCCXIX (319), MCCLIV (1254)
* M:1000, D:500, C:100, L:50, X:10, V:5, I:1
* 2. Un número perfecto es un entero positivo, que es igual a la suma de todos los enteros positivos que son divisores del número. El primer número perfecto es 6, ya que los divisores de 6 son 1, 2 y 3. Escribe un script que muestre los tres primeros números perfectos y su suma.
* 3. Una matriz cuadrada A se dice que es simétrica si A(i,j) = A(j,i) para todo i,j dentro de los límites de la matriz. Escribe una función que determine si una matriz es cuadrada y un programa que permita introducir el tamaño de la matriz y sus elementos en un formulario.
* 
* Autor: Francisco Javier Frías Serrano
*/
?>

<?php
  // Includes
  // include "";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Ejercicios básicos semana 2</title>
</head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "generar_usuarios";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE usuarios (
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
apellido1 VARCHAR(30) NOT NULL,
apellido2 VARCHAR(30) NOT NULL,
compuesto VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table generar_usuarios created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 

<?php
  // Boton para ir al repositorio del ejercicio
    echo "<br/><a href=''><button>Repositorio</button></a>";    
?>

</body>

</html>