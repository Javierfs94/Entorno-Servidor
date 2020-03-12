<?php
namespace App\Models;
class Perro{
    private $_nombre;
    private $_color;
    private $_habilidad; //0 a 100
    private $_sociabilidad;

public function __construct($nombre,$color){
    $this->_nombre=$nombre;
    $this->_color=$color;
    $this->_habilidad=0;
    $this->_sociabilidad=5;
}

public function entrenar(){
    echo "<p>Dar la pata</p>";
    if ($this->_habilidad<=100) {
        $this->_habilidad++;
    }
}

public function darPata(){
    $retorno = "<p>¿Cómo?</p>";
    if ($this->_habilidad>5) {
        $retorno = "<p>Levanta la pata</p>";    
    }
    echo $retorno;
}

}
?>