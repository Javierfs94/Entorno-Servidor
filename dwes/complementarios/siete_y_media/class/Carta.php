<?php
class Carta {
  private $_numero;
  private $_palo;

  public function __construct($numero, $palo){
    $this->_numero = $numero;
    $this->_palo = $palo;
  }

  public function getNumero(){
    return $this->_numero;
  }

  public function getPalo(){
    return $this->_palo;
  }

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
 
  private function getURLImagen(){
    return "img/".$this->getPaloNombre()."/".$this->getNumero().".jpg";
  }

  public function getImagen(){
    return "<img src=".$this->getURLImagen().">";  
  }

}
?>