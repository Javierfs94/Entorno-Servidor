<?php
class Ficha{
    private $_imagen;
    private $_puzle;
    private $_posicion;

    /**
     * Constructor de Ficha
     */
    public function __construct($numeroPuzle,$posicion,$imagen){
        $this ->_imagen = $imagen;
        $this ->_puzle = $numeroPuzle;
        $this ->_posicion = $posicion;
    }

    /**
     * Devuelve la imagen
     */
    public function getImagen(){
        return $this ->_imagen;
    }    
    
    /**
     * Devuelve el puzzle
     */
    public function getPuzle(){
        return $this ->_puzle;
    }
    
    /**
     * Devuelve la posición
     */
    public function getPosicion(){
        return $this ->_posicion;
    }

}

?>