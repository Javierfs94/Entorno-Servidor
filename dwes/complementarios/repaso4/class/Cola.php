<?php
class Cola{
    private $_elementos = array();

    /**
     * Constructor de Cola
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
        array_shift($this->_elementos);
    }

    /**
     * Muestra la cola
     */
    public function mostrarCola(){
        for ($i = 0; $i <= count($this->_elementos)-1; $i++){
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