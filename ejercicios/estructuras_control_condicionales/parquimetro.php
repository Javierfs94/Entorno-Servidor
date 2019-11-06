<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parquímetro</title>
</head>

<body>
    <?php
    /**
* Comportamiento de un parquimetro
*
* @author Francisco Javier Frías Serrano
 */
$entrada ="5";
$salida ="10.5";
$precio ="1.1";
$paga ="20";

$tiempo = $salida - $entrada;
$debe = $precio * $tiempo;
$deuda = $paga - $debe;
$centimosTotales= $deuda*100;

$billetes10 = (int) ($centimosTotales/1000);
$centimosTotales = $centimosTotales%1000;
$billetes5 = (int) ($centimosTotales/500);
$centimosTotales = $centimosTotales%500;
$billetes2 = (int) ($centimosTotales/200);
$centimosTotales = $centimosTotales%200;
$billetes1 = (int) ($centimosTotales/100);
$centimosTotales = $centimosTotales%100;
$billetes050 = (int) ($centimosTotales/50);
$centimosTotales = $centimosTotales%50;
$billetes020 = (int) ($centimosTotales/20);
$centimosTotales = $centimosTotales%20;
$billetes010 = (int) ($centimosTotales/10);
$centimosTotales = $centimosTotales%10;
$billetes005 = (int) ($centimosTotales/5);
$centimosTotales = $centimosTotales%5;
$billetes002 = (int) ($centimosTotales/2);
$centimosTotales = $centimosTotales%2;
$billetes001 = (int) ($centimosTotales/1);
$centimosTotales = $centimosTotales%1;
?>

    <table border='1'>
        <tr>
            <th>Hora Entrada</th>
            <th>Hora Salida</th>
            <th>Precio</th>
            <th>Tiempo transcurrido</th>
            <th>A pagar</th>
            <th>Pago</th>
            <th>A devolver</th>
        </tr>
        <tr>
            <td><?php echo $entrada; ?></td>
            <td><?php echo $salida; ?></td>
            <td><?php echo $precio; ?></td>
            <td><?php echo $tiempo; ?></td>
            <td><?php echo $debe; ?></td>
            <td><?php echo $paga; ?></td>
            <td><?php echo $deuda; ?></td>
        </tr>

    </table>


    <table border='1'>
        <tr>
            <th>Billetes de 10</th>
            <th>Billetes de 5</th>
            <th>Monedas de 2</th>
            <th>Monedas de 1</th>
            <th>Monedas de 0.50</th>
            <th>Monedas de 0.20</th>
            <th>Monedas de 0.10</th>
            <th>Monedas de 0.05</th>
            <th>Monedas de 0.02</th>
            <th>Monedas de 0.01</th>
        </tr>
        <tr>
            <td><?php echo $billetes10; ?></td>
            <td><?php echo $billetes5; ?></td>
            <td><?php echo $billetes2; ?></td>
            <td><?php echo $billetes1; ?></td>
            <td><?php echo $billetes050; ?></td>
            <td><?php echo $billetes020; ?></td>
            <td><?php echo $billetes010; ?></td>
            <td><?php echo $billetes005; ?></td>
            <td><?php echo $billetes002; ?></td>
            <td><?php echo $billetes001; ?></td>
        </tr>
    </table>

<?php
    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
    ?>
</body>
</html>