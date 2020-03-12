<?php
for ($i=1; $i < 11; $i++) { 
    echo "<h2>Tabla del $i</h2>";
    for ($j=1; $j < 10; $j++) { 
        echo  $i.' * '.$j.' = '.$i * $j."<br>";
    }
}

echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>