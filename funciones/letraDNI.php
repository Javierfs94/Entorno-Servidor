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


<div>
    <h2>Letra DNI</h2>
</div>
<!-- Formularo para pedir los numeros del DNI maximo 8 -->
    <form method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h4></h4>
        <input type="text" name="dni" maxlength="8">
        <input type="submit" name="enviar" value="Calcular Letra">        
    </form>
    <?php    
//Si le he dado a enviar, comprueba si es numérico.
        if(isset($_POST['enviar'])){
            if (!is_numeric($_POST['dni'])) {
                echo ("Numero de DNI");
                //Compruena que haya 8 caracteres
            } else if (strlen($_POST['dni'])!=8) {
                echo ("<p>Mínimo 8!</p>");
            } else {
                $letra=calcularLetraDNI($_POST['dni']);
                echo "<p>La letra del DNI ".$_POST['dni']. " es $letra.</p>";
            }
        }
/**
 * Funcion para calcular la letra compuesta en un array
 */
function calcularLetraDNI($numero){
    $letra=array("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E");
    return $letra[$numero%23];
}
?>

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