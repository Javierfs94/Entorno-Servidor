<?php
class Pila{
    private $_elementos = array();

    /**
     * Constructor de Pila
     */
    public function __construct($elementos){
        $this->_elementos = $elementos;      
    }

    /**
     * Añade un elemento al array
     */
    public function push($elemento){
        array_push($this->_elementos, $elemento);
    }
    
    /**
     * Saca un elemento del array
     */
    public function pop(){
        array_pop($this->_elementos);
    }

    /**
     * Muestra la pila
     */
    public function mostrarPila(){
        for ($i = count($this->_elementos)-1; $i >= 0; $i--){
            echo "<p>". $this->_elementos[$i]."</p>";
        }
    }

    /**
     * Devuelve los elementos
     */
    public function getElementos(){
        return $this->_elementos;
    }
}
?>