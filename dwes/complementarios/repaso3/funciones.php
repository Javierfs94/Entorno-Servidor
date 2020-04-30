<?php
function isPerfect($number){
    $divisores = 0;
    for ($i = 1; $i < $number; $i++) { 
      if ($number % $i == 0) {
        $divisores += $i;
      }
    }
  
    return ($divisores === $number);
  }
  
  function tresPrimerosPerfect(){
    $number = 2;
    $aux = 0;
    $acum = 0;
    echo "Números perfectos";
    while ($aux < 3){
     if (isPerfect($number)){
      $aux++;
      $acum += $number;
      echo "<p>".$number."</p>";
     }
     $number++;
    }
    echo "<p>La suma de los 3 primeros perfectos es: ".$acum."</p>";
  }
  
?>