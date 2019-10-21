<?php
/*
* Titulo: EjercicioDNI
* Descripcion: Escribe un script en php para calcular la letra del NIF a partir del número del DNI recogido en un formulario.
La letra se obtiene calculando el resto de la división del número del DNI por 23. A cada resultado le corresponde una letra:
 0=T; 1=R; 2=W; 3=A; 4=G; 5=M; 6=Y; 7=F; 8=P; 9=D; 10=X; 11=B; 12=N; 13=J; 14=Z; 15=S; 16=Q; 17=V; 18=H; 19=L; 20=C; 21=K; 22=E.
Utiliza un array para almacenar las letras.
* Autor: Francisco Javier Frías Serrano
*/
?>
<!-- 
let letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

let numeroDNI = prompt("Introduzca su número del DNI (sin la letra)");
let letraDNI = prompt("Introduzca la letra de su DNI (en mayúsculas)");
letraDNI.toUpperCase();

if (numeroDNI < 0 || numeroDNI > 10000000) {
    alert("Número introducido no válido");
} else {
    let letraCalculada = letras[numeroDNI % 23];
    if (letraCalculada != letra) {
        alert("La letra no es correcta");
    } else {
        alert("El DNI es correcto");
    }
} -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>DNI</title>
</head>

<body>
<?php
$letras = array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E');

if(isset($_POST['enviar'])) {
    $numeroDNI = $_POST['numero'];
    $letraDNI = $_POST['letra'];

    if ($numeroDNI < 0 || $numeroDNI > 99999999) {
        echo("Número introducido no válido");
    } else {
        $letraCalculada = $letras[$numeroDNI % 23];
        if ($letraDNI != $letras[$letraCalculada]) {
            echo("La letra no es correcta");
        } else {
            echo("El DNI es correcto");
        }
    } 
}

 
?>

<form action="dni.php" method="post">

Número DNI: <input type="text" name="numero">
Letro DNI: <input type="text" name="letra">
<input type="submit" value="Enviar" name="enviar">

</form>

    <footer>
        <footer>
            <p>Página diseñada por <b>Francisco Javier Frías Serrano</b></p>
            <a href="https://github.com/Javierfs94" target="_blank"><img src="img\GitHub.jpg" alt="" height="50"
                    width="50"></a>
            <a href="https://twitter.com/javifs94" target="_blank"><img src="img\Twitter.png" alt="" height="50"
                    width="50"></a>
            <a href="https://es.linkedin.com/in/javifs94" target="_blank"><img src="img\LinkedIn.png" alt="" height="50"
                    width="50"></a>
        </footer>
    </footer>

    <?php
    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>
    <a href="../../../"><button>Volver</button></a>

</body>

</html>