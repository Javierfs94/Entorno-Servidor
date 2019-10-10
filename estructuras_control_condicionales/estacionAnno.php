    <h2>Estación del año</h2>
    <?php
  
    $mes = date("n");
    $dia = date("j");

    switch ($mes){
        case 1:
        case 2:
            $estacion = "invierno";
            break;

        case 4:
        case 5:
            $estacion = "primavera";
            break;

        case 7:
        case 8:
            $estacion = "verano";
            break;

        case 10:
        case 11:
            $estacion = "otonno";
            break;

        case 3:
            if ($dia < 21)
                $estacion = "invierno";
            else
                $estacion = "primavera";
            break;

        case 6:
            if ($dia < 21)
                $estacion = "primavera";
            else
                $estacion = "verano";
            break;

        case 9:
            if ($dia < 23)
                $estacion = "verano";
            else
                $estacion = "otonno";
            break;

        case 12:
            if ($dia < 21)
                $estacion = "otonno";
            else
                $estacion = "invierno";
            break;
    }
 
    $fileDir = "imagenes/" . $estacion . ".jpg";

    echo "<img src=\"$fileDir\" style='width: 750px; height: 450px; margin: 10px auto; display: block'>";
    echo "<br/><a href='../verCodigo.php?src=".__FILE__."'><button>Ver Codigo</button></a>";    
    ?>