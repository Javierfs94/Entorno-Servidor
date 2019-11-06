<div>
    <h2>Paleta de colores</h2>
</div>
<?php
    //Creamos una tabla para almacenarlos
    //los colores tienen 3 combinaciones con RGB
    $color = "";
    echo "<table style='margin: 0 auto;  border-spacing: 4px'>";
    for ($i = 0; $i < 300; $i += 120) {
        for ($j = 0; $j < 300; $j += 120) {

            echo "<tr>";

            for ($k = 0; $k < 300; $k += 24) {
                $color = "rgb($i,$j,$k)";
                $hex = "#";
                $hex .= dechex($i);
                $hex .= dechex($j);
                $hex .= dechex($k);
                echo "<td style=\"background-color:$color\">$hex</td>";
               
            }
    echo "</tr>";
        }
    }
    echo "</table>";
    
    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";
    ?>