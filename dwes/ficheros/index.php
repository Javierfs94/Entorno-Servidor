<?php
$file = fopen("alumnos.txt", "r");
$contador = 0;
$arrayUsers=array();
$contadorRepetidos=0;

function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}
// $origen = fopen($_POST["origen"], "r");
$origen = fopen("alumnos.txt", "r");

do {

    $cadena = normaliza(strtolower(fgets($origen)));

    if ($contador > 7) {
        $nombreCompleto = explode(" ", $cadena);
        $user = substr($nombreCompleto[0], 0, 2).substr($nombreCompleto[1], 0, 2).substr($nombreCompleto[2], 0, 2);
        do {
            if (in_array($user, $arrayUsers)) {
                $user = $user.$contadorRepetidos;
                echo $user."<br>";
                $contadorRepetidos++;
            }
            array_push($arrayUsers, $user);
        } while (!in_array($user, $arrayUsers));
        echo $user."<br>";
    }

    $contador++;
    
} while (!feof($origen));

fclose($origen);

?>