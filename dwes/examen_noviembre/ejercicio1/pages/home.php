<?php
/*
* Titulo: Horario
* Descripcion: Array que almacena la información del horario de 2ºDAW
* Autor: Francisco Javier Frías Serrano
* Fecha: 18/11/2019
*/

$diasSemana = array("Lunes","Martes","Miércoles","Jueves","Viernes");


// Array con el horario de clase
$horario = array(
   "DWES"=>array("nombre"=>"Desarrollo web en entorno servidor",
                 "profesor"=>"José Aguilera",
                 "horario"=>array(
                                   array("Dia"=>"Lunes", "Hora"=>"3"),
                                   array("Dia"=>"Lunes", "Hora"=>"4"),
                                   array("Dia"=>"Martes", "Hora"=>"5"),
                                   array("Dia"=>"Martes", "Hora"=>"6"),
                                   array("Dia"=>"Jueves", "Hora"=>"3"),
                                   array("Dia"=>"Jueves", "Hora"=>"4"),
                                   array("Dia"=>"Viernes", "Hora"=>"3"),
                                   array("Dia"=>"Viernes", "Hora"=>"4"),
                               )
                 ),
   "HLC"=>array("nombre"=>"Desarrollo Android",
               "profesor"=>"José Aguilera",
               "horario"=>array(
                               array("Dia"=>"Martes", "Hora"=>"3"),
                               array("Dia"=>"Martes", "Hora"=>"4"),
                               array("Dia"=>"Miércoles", "Hora"=>"6"),
                               )
               ),
   "DWEC"=>array("nombre"=>"Desarrollo web en entorno cliente",
               "profesor"=>"Lourdes Magarín",
               "horario"=>array(
                               array("Dia"=>"Lunes", "Hora"=>"1"),
                               array("Dia"=>"Lunes", "Hora"=>"2"),
                               array("Dia"=>"Miércoles", "Hora"=>"4"),
                               array("Dia"=>"Miércoles", "Hora"=>"5"),
                               array("Dia"=>"Viernes", "Hora"=>"5"),
                               array("Dia"=>"Viernes", "Hora"=>"6"),
                               )
               ),
   "DIWEB"=>array("nombre"=>"Diseño web",
               "profesor"=>"Jaime Rabasco Ronda",
               "horario"=>array(
                               array("Dia"=>"Lunes", "Hora"=>"5"),
                               array("Dia"=>"Lunes", "Hora"=>"6"),
                               array("Dia"=>"Martes", "Hora"=>"1"),
                               array("Dia"=>"Martes", "Hora"=>"2"),
                               array("Dia"=>"Jueves", "Hora"=>"1"),
                               array("Dia"=>"Jueves", "Hora"=>"2"),
                               )
               ),
   "DAWEB"=>array("nombre"=>"Despliegue de aplicaciones web",
               "profesor"=>"Mari Carmen Tripiana",
               "horario"=>array(
                               array("Dia"=>"Miércoles", "Hora"=>"3"),
                               array("Dia"=>"Jueves", "Hora"=>"5"),
                               array("Dia"=>"Jueves", "Hora"=>"6"),
                               )
               ),
   "EIE"=>array("nombre"=>"Empresas e iniciativa emprendedora",
               "profesor"=>"Gema Sánchez",
               "horario"=>array(
                               array("Dia"=>"Miércoles", "Hora"=>"1"),
                               array("Dia"=>"Miércoles", "Hora"=>"2"),
                               array("Dia"=>"Viernes", "Hora"=>"1"),
                               array("Dia"=>"Viernes", "Hora"=>"2"),
                               )
               ),
);


/**
 * Imprime el horario pasando el día y la hora
 */
function horarioDia($d, $h, $horario) {
   foreach ($horario as $asignatura => $valor) {            
       foreach ($valor["horario"] as $dia) {
           if ($d==$dia["Dia"] && $h==$dia["Hora"])
               return $asignatura;
       }
   }
}

?>

<!DOCTYPE html>
<html lang="es">

<body>
    
<?php

echo "<table>";

// Dia de la semana
echo "<tr class='dias'>";
for ($i=0; $i<sizeof($diasSemana); $i++)  
    echo "<td><b>".$diasSemana[$i]."</b></td>";
echo "</tr>";

// Asignaturas según día y hora
for ($hora = 1; $hora < 7; $hora++) { 
    echo "<tr>";
    for ($j = 0; $j<sizeof($diasSemana); $j++) { 
        echo "<td>".horarioDia($diasSemana[$j],$hora, $horario)."</td>";
    }
    echo "</tr>";
}
echo "<table>";

echo "<h2>Leyenda</h2>";

foreach ($horario as $asignatura => $valor) {
    echo "$asignatura -  ".$valor['nombre']." (".$valor['profesor'].")<br>";
}

?>

</body>
</html>