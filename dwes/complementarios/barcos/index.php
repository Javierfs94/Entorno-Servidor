<?php
/*
* Titulo: Ejercicio 5
* Descripcion: Escribe un programa que genere números aleatorios y almacene en un array los barcos del juego hundir la flota.
* 1 de 4
* 2 de 3
* 3 de 2
* 4 de 1
* Autor: Francisco Javier Frías Serrano
*/
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barcos</title>
</head>

<body>

<div>
    <h2>Barcos</h2>
    <p>Escribe un programa que genere números aleatorios y almacene en un array los barcos del juego hundir la flota.</p>
    <p>2 de 3</p>
    <p>1 de 4</p>
    <p>4 de 1</p>
    <p>3 de 2</p>
</div>

<?php
    include "Flota.php";
    
    $barco = null;
    $tipo = 1;
    $flota= new Flota();
    
    for($i=0; $i<10; $i++){
        switch($i){
            case 1:
            case 2:
            case 3:
            case 4:
                $tipo=1;
                break;
            case 5:
            case 6:
            case 7:
                $tipo=2;
                break;
            case 8:
            case 9:
                $tipo=3;
                break;
            case 10:
                $tipo=4;
                break;
        }
        $barco = new Barco($i, $tipo);
        $flota->addBarco($barco);
    }
    $flota->colocarBarcos();
    $flota->mostrarFlota();
?>

<?php
    echo "<br/><a href='../../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";
?>
    <a href="../../../"><button>Volver</button></a>

</body>

</html>