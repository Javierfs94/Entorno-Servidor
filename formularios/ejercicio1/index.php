<?php
/**
* Mostrar un calendario introduciendo el mes y el año en un formulario.
*
* @author Francisco Javier Frías Serrano
 */
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 1 - Calendario</title>
</head>

<body>
    <?php    
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre",
        "Octubre","Noviembre","Diciembre");
        $mesSeleccionado=date("n");
        $annoSeleccionado=date("Y");

        if(isset($_POST['enviar'])) {
            $mesSeleccionado=$_POST['mes'];
            $annoSeleccionado=$_POST['anno'];
        }
?>
    <form action="calendario.php" method="post">
        <select name="mes">
            <?php
                    for ($j=0; $j<12; $j++) { 
                        echo ($j==$mesSeleccionado-1) ? "<option type='text' value=".($j+1)." selected>".$meses[$j]."</option>" 
                            : "<option type='text' value=".($j+1).">".$meses[$j]."</option>";
                    }                  
            ?>
        </select>
        <select name="anno">
            <?php
                for ($i=2018; $i<2021; $i++) { 
                    echo ($i==$annoSeleccionado) ? "<option type='text' value=".$i." selected>".$i."</option>" 
                        : "<option type='text' value=".$i.">".$i."</option>";
                }                    
            ?>
        </select>
        <br><input type="submit" value="Enviar">
    </form>

    <?php
    echo "<br/><a href='../../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>"; 
        ?>
    <a href="../../../"><button>Volver</button></a>

</body>

</html>