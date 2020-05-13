<?php
function sumaVector($array){
    if (count($array) <= 1){
      return $array[0];
    } else{
      $aux = array_pop($array);
      return $aux + sumaVector($array);
    }
  }
  
  function comprobarEquilibrado($cadena){
    $cadenaArray = str_split($cadena);
    $pila = new Pila();
    $comprobante = true;
    for ($i = 0; $i < count($cadenaArray) && $comprobante == true; $i++) { 
      if ($cadenaArray[$i] == "("){
        $pila->push($cadenaArray);
      }else if ($cadenaArray[$i] == ")"){
        if (count($pila->getElementos()) == 0) {
          $comprobante = false;
        } else{
          $pila->pop();
        }
      }
    }
    return $comprobante;
  }
?>