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
    
        $meses = array("Enero","Febrero","Marco","Abril","Mayo","Junio","Julio","Agosto","Septiembre",
        "Octubre","Noviembre","Diciembre",);
?>
        <form action="calendario.php" method="post">
            <select name="mes">
            <?php
                for($i=1;$i<=sizeof($meses);$i++)
                    echo "<option value=\"".$i."\">".$meses[$i-1]."</option>";
            ?>
        </select>
            <select name="ano">
            <?php
                for ($i=2018; $i <=2020 ; $i++) { 
                    echo "<option value=\"".$i."\">".$i."</option>";
                }                    
            ?>
        </select>
            <input type="submit" value="Enviar">
        </form>

        <?php
    echo "<br/><a href='../../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";
?>
</body>

</html>