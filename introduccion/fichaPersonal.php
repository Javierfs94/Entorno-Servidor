<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha Personal</title>
</head>

<body>

    <?php
$nombre ="Francisco Javier";
$apellidos ="Frias Serrano";
$edad ="25";
$profesion ="Informatico";
?>

    <table border='1'>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Profesion</th>
        </tr>
        <tr>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $apellidos; ?></td>
            <td><?php echo $edad; ?></td>
            <td><?php echo $profesion; ?></td>
        </tr>
    </table>
    <?php
    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
    ?>
</body>

</html>