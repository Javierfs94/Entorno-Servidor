<?php
class Carta {
  private $_numero;
  private $_palo;

  /**
   * Constructor
   */
  public function __construct($numero, $palo){
    $this->_numero = $numero;
    $this->_palo = $palo;
  }

  /**
   * Devuelve el número de la carta
   */
  public function getNumero(){
    return $this->_numero;
  }

  /**
   * Devuelve el palo de la carta
   */
  public function getPalo(){
    return $this->_palo;
  }

  /**
   * Devuelve el nombre de la carta
   */
  public function getPaloNombre(){
    switch ($this->_palo) {
      case 0:
          return "basto";
      case 1:
          return "copa";
      case 2:
          return "espada";
      case 3:
          return "oro";
    }
  }
 
  /**
   * Devuelve la URL donde está la imagen
   */
  private function getURLImagen(){
    return "img/".$this->getPaloNombre()."/".$this->getNumero().".jpg";
  }

  /**
   * Devuelve la imagen
   */
  public function getImagen(){
    return "<img src=".$this->getURLImagen().">";  
  }

}
?>