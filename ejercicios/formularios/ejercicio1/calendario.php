<?php
/**
* Mostrar un calendario introduciendo el mes y el año en un formulario.
*
* @author Francisco Javier Frías Serrano
 */

$diasMes = cal_days_in_month(CAL_GREGORIAN, $_POST['mes'], $_POST['anno']);
$primerDiaMes = strtotime($_POST['anno'] . "-" . $_POST['mes'] . "-01");
$dia = date('N', $primerDiaMes);
echo "<table border=2px;><tr>";
echo "<td>Lunes</td>";
echo "<td>Martes</td>";
echo "<td>Miércoles</td>";
echo "<td>Jueves</td>";
echo "<td>Viernes</td>";
echo "<td>Sábado</td>";
echo "<td>Domingo</td></tr>";
echo "<tr>";
$columnas = 0;
for ($j = 1; $j < $dia; $j++) {
    echo "<td style=background-color:grey;></td>";
    $columnas++;
}
for ($i = 1; $i < 32; $i++) {
    $columnas++;
    if ($columnas % 7 == 0) {
        echo "<td style=background-color:red;>$i</td>";
    } elseif ($i == date("d")) {
        echo "<td style=background-color:green;>$i</td>";
    } else {
        echo "<td>$i</td>";
    }

    if ($columnas % 7 == 0) {
        echo "</tr>";
    }

    if ($i >= $diasMes) {
        break;
    }
}
echo "</table>";
echo "<br/><a href='index.php'><button>Volver</button></a>";
echo "<br/><a href='../../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";
?>