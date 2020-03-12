<?php
require_once("Persona.php");
// Clase Alumno, hijo de Persona, con sus propiedades y métodos
class Alumno extends Persona {

    private $_nie;

    public function saludar(){
        echo parent::saludar();
        echo "<p>Soy un alumno!</p>";
    }
}
?>