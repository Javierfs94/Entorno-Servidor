<div>
    <h2>Calendario</h2>
</div>
<?php
        $mes = 10; //Mes elegido
        $anio = 2019;  //Año elegido
        $numeroDias = 31; //Número del mes elegido   
        $primerDia = 1; //Primer dia del mes        
        $dia = 1; 
        $diaActual = date("j");
        $mesActual = date("n");

        echo "
                <table style='border: double; margin: 20px auto'>
                    <tr>
                        <td >Lunes</td>
                        <td >Martes</td>
                        <td >Miércoles</td>
                        <td >Jueves</td>
                        <td >Viernes</td>
                        <td >Sábado</td>
                        <td >Domingo</td>
                    </tr>               
            ";

            while ($dia <= $numeroDias) {
            echo "<tr>";
            for ($j = 0; $j < 7; $j++) {
                if ($dia == $numeroDias + 1) {
                    break;
                } else if ($dia == $diaActual && $mes == $mesActual ) {
                    echo "<td style=' background-color: green'>" . $dia++ . "</td>";
                } else if ($j == 6) {
                    echo "<td style=' background-color: red'>" . $dia++ . "</td>";
                } else {
                    echo "<td>" . $dia++ . "</td>";
                }

            }

            echo "</tr>";
        }

        echo "</table>";
    
        echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
    ?>