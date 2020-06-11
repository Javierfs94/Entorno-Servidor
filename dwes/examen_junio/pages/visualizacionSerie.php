<?php
if ($_SESSION["perfil"] == "basico") {
    echo "<p>Reproduciendo serie</p>";
    echo "<p>Se ha aumentado el número de visualizaciones de la serie</p>";
}

// if ($array[0]["id_plan"] == 2 && $_SESSION["perfil"] != "premium"){
//     echo "Reproduciendo serie";

// }elseif ($array[0]["id_plan"] == 1 && $_SESSION["perfil"] != "basico") {
//     echo "Reproduciendo serie basica";

// }
 else {
    echo "No valido";
}

?>