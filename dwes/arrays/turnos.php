<?php
$diaMaximo = 0;
$horasTotalesTrabajadas = 0;
$diaMasTrabajado = "";
$jornadaMasTrabajada = "";
$maximo = 0;


    $jornada=array("Lunes"=>array("Mañana" => 2,"Tarde" => 4),
                    "Martes"=>array("Mañana" => 3,"Tarde" => 5),
                    "Miércoles"=>array("Mañana" => 4,"Tarde" => 0),
                    "Jueves"=>array("Mañana" => 6,"Tarde" => 2),
                    "Viernes"=>array("Mañana" => 0,"Tarde" => 4));
    
    foreach ($jornada as $indice => $indice2) {
        foreach ($indice2 as $turno => $horas) {
            $horasTotalesTrabajadas += (int)$horas;
            if ($maximo < $horas) {
                $maximo = $horas;
                $jornadaMasTrabajada=$turno;
                $diaMasTrabajado=$indice;
            }
        }
    }

    echo "Horas totales trabajadas esta semana: $horasTotalesTrabajadas<br/>";
    echo "El día más trabajado fue $diaMasTrabajado y fueron $maximo en el turno de $jornadaMasTrabajada";
    
    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
?>