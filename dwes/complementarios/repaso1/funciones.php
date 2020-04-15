<?php
/**
 * Comprueba si el número pasado por parámetro es primo o no y devuelve true o false
 */
  function comprobarSiEsPrimo($numero)
  {
      if ($numero == 2 || $numero == 3 || $numero == 5 || $numero == 7) {
          return true;
      } else {
          // comprobamos si es par
          if ($numero % 2 != 0) {
              // comprobamos solo por los impares
              for ($i = 3; $i <= sqrt($numero); $i += 2) {
                  if ($numero % $i == 0) {
                      return false;
                  }
              }
              return true;
          }
      }
      return false;
  }

/**
* Calcula los 5 primeros números primos y los muestra
*/
function cincoPrimerosPrimos(){
    $cincoPrimos = array();
  
    for ($i=0; $i < 100; $i++) { 
        if (comprobarSiEsPrimo($i)) {
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