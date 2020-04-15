<?php
class DNI{
    private $_dni;
    private $_mensaje = "";
    
    public function __construct($dni){
        $this->_dni = $this->validar_dni($dni);
    }
    
    private function validar_dni($dni){
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letraDNI = strtoupper(substr($dni, -1));
        $numeros = substr($dni, 0, -1);

        if (substr($letras, ($numeros%23), 1) == $letraDNI && strlen($letraDNI) == 1 && strlen($numeros) == 8 ){
            $this->_mensaje = "El DNI: ".$dni." es válido";
        }else{
            $this->_mensaje = "El DNI: ".$dni." no es válido";
        }
    }

    public function getMensaje(){
        return $this->_mensaje;
    }

}
?>