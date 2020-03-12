<?php

$suma = 0;

for ($i=2; $i < 7; $i++) { 
    if ($i%2==0) {
        $suma += $i;
    }
}

echo $suma;

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>

