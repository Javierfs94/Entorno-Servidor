<?php
/**
 * Devuelve el ganador de la partida
 */
function juego(){    
    if (getPuntos($_SESSION["jugador"])<= 7.5 && getPuntos($_SESSION["jugador"]) > getPuntos($_SESSION["banca"]) || getPuntos($_SESSION["jugador"])<= 7.5 &&  getPuntos($_SESSION["banca"]) > 7.5) {
      $ganador = "El jugador";  
    }elseif (getPuntos($_SESSION["jugador"]) == getPuntos($_SESSION["banca"])) {
      $ganador = "Empate";  
    }
    else {
      $ganador = "La banca";
    }
    return "<h2>¡".$ganador." ha ganado!</h2>";
  }
  
  /**
   * Genera la mano de la banca
   */
  function generarManoBanca(){
    do {
      $carta = array_pop($_SESSION["baraja"]);
      array_push($_SESSION["banca"], $carta);
    } while (getPuntos($_SESSION["banca"]) <= 5.5);
  }
  
  /**
   * Devuelve la última carta de la baraja y se la añade a la mano del jugador
   */
  function sacarCartaJugador(){
    $carta = array_pop($_SESSION["baraja"]);
    array_push($_SESSION["jugador"], $carta);
  }
  
  /**
   * Devuelve los puntos de la mano pasada como parámetro
   */
  function getPuntos($mano){
    $puntos = 0;
    foreach ($mano as $key => $carta) {
      if ($carta->getNumero() == 8 || $carta->getNumero() == 9 || $carta->getNumero() == 10) {
        $puntos += 0.5;
      }else {
        $puntos += $carta->getNumero();
      }
    }
    return $puntos;
  }
?>