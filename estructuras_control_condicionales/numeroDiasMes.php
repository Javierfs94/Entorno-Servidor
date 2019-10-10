<?php
$mes = '1';
$anno = '2019';
$dias31 = '31';
$dias30 = '30';

switch ($mes) {
    case '1':
        echo "Enero de $anno tiene $dias31";
    break;
    case '2':
        echo "Febrero de $anno tiene 28días";
    break;
    case '3':
        echo "Marzo de $anno tiene $dias31 días";
    break;
    case '4':
        echo "Abril de $anno tiene $dias30 días";
    break;
    case '5':
        echo "Mayo de $anno tiene $dias31 días";
    break;
    case '6':
        echo "Junio de $anno tiene $dias30 días";
    break;
    case '7':
        echo "Julio de $anno tiene $dias31 días";
    break;
    case '8':
        echo "Agosto de $anno tiene $dias31 días";
    break;
    case '9':
        echo "Septiembre de $anno tiene $dias30 días";
    break;
    case '10':
        echo "Octubre de $anno tiene $dias31 días";
    break;
    case '11':
        echo "Noviembre de $anno tiene $dias30 días";
    break;
    case '12':
        echo "Diciembre de $anno tiene $dias31 días";
    break;

    default:
        echo "No es un mes correcto";
    break;
}

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>