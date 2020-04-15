<?php
/**
 * Comprueba si el número pasado por parámetro es primo o no y devuelve true o false
 */
function esPrimo($numero) {
    for($i = 2; $i < $numero; $i++) {
        if($numero % $i == 0){
            return false;
        }
    }
    return true;
}

/**
* Calcula los 5 primeros números primos y los muestra
*/
function cincoPrimerosPrimos(){
    $cincoPrimos = array();
  
    for ($i=0; $i < 100; $i++) { 
        if (esPrimo($i)) {
            array_push( $cincoPrimos, $i);
        }
        if (count($cincoPrimos) == 5) {
            break;
        }
    }

    echo "<p>Los 5 primeros números primos son:</p>";
    foreach ($cincoPrimos as $key => $value) {
        echo $value."<br>";
    }
}

?>