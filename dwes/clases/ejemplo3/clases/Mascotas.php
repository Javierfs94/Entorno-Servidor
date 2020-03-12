<?php
// Clase Preferencia con sus propiedades y métodos
class Mascotas   {

    private $_nombre;
    private static $contador;
   

public function __construct($nombre){
    $this->_nombre = $nombre;
    self::$contador++;
    echo "<p>Ha nacido la mascota nº".self::$contador." (".$this->_nombre.")</p >";
}

public function __toString(){
    return (string)$this->contador;
}

public static function total(){
    return self::$contador;
}


}


?>