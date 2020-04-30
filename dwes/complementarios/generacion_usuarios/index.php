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
  include "funciones.php";
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

if (isset($_POST["enviar"])) {
    $file = fopen("alumnos.txt", "r");
    $contador = 0;
    $arrayUsers = array();
    $contadorRepetidos=0;
    
    $origen = fopen($_POST["fichero"], "r");
    
    do {
    
        $cadena = normaliza(strtolower(fgets($origen)));
    
        if ($contador > 7) {
            $nombreCompleto = explode(" ", $cadena);
            $user = substr($nombreCompleto[0], 0, 2).substr($nombreCompleto[1], 0, 2).substr($nombreCompleto[2], 0, 2);
            do {
                if (in_array($user, $arrayUsers)) {
                    $user = $user.$contadorRepetidos;
                    $contadorRepetidos++;
                }
                array_push($arrayUsers, $user);
            } while (!in_array($user, $arrayUsers));
        }
    
        $contador++;
        
    } while (!feof($origen));
    
    fclose($origen);


if ($_POST["tipo"] == "mysql") {
    $salida = fopen("salida.txt","w");
    foreach ($arrayUsers as $key => $usuario) {
        
        $comando1 = "CREATE USER '$usuario'@'localhost' IDENTIFIED BY '$usuario' \n";
        $comando2 = "GRANT ALL PRIVILEGES ON * . * TO '$usuario'@'localhost' \n";

        fwrite($salida, $comando1);
        fwrite($salida, $comando2);
    }
    fclose($salida);
}

if ($_POST["tipo"] == "linux") {
    $salida = fopen("salida.txt","w");
    foreach ($arrayUsers as $key => $usuario) {

        $comando1 = "sudo useradd $usuario \n";
        $comando2 = "sudo passwd $usuario \n";

        fwrite($salida, $comando1);
        fwrite($salida, $comando2);
    }
    fclose($salida);
}
    
}

?>


<form method="post" action="index.php" name="signin-form">
    <div class="form-element">
        <label>Tipo Comando</label>
        <select name="tipo">
        <option value="mysql">MySql</option>
        <option value="linux">Linux</option>
        </select>
    </div>
    <div class="form-element">
        <label>Fichero</label>
        <input type="text" name="fichero" required />
    </div>
    <button type="submit" name="enviar" value="enviar">Enviar</button>
</form>

<?php
  // Boton para ir al repositorio del ejercicio
    echo "<br/><a href='https://github.com/Javierfs94/Entorno-Servidor/tree/master/dwes/complementarios/generacion_usuarios'><button>Repositorio</button></a>";    
?>

</body>

</html>