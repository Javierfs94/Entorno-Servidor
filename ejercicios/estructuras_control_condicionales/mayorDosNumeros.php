<?php
$num1 = '5';
$num2 = '7';

echo "Los números son: $num1 y $num2<br>";

if ($num1>$num2) {
    echo "$num1 es mayor que $num2";
}elseif ($num1<$num2) {
    echo "$num2 es mayor que $num1";
} else {
    echo "Son iguales";
};

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>