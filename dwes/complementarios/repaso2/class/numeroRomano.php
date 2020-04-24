<?php
class NumeroRomano{
    private $_cadena;
    private $_numero;

    public function __construct($cadena){
        $this->_cadena = $cadena;
        $this->_numero = $this->transformar($cadena);
    }

    private function transformar($cadena){
        $arrayLetras = str_split($cadena);
        $arrayValores=array();
        foreach ($arrayLetras as $indice => $letra) {
           switch ($letra) {
                case 'M':
                    array_push($arrayValores, 1000);
                    break;
                case 'D':
                    array_push($arrayValores, 500);
                    break;
                case 'C':
                    array_push($arrayValores, 100);
                    break;
                case 'L':
                    array_push($arrayValores, 50);
                    break;
                case 'X':
                    array_push($arrayValores, 10);
                    break;
                case 'V':
                    array_push($arrayValores, 5);
                    break;
                case 'I':
                    array_push($arrayValores, 1);
                    break;
               
               default:
              
                   break;
           }
        }
        return $arrayValores;
    }

    public function romanToArabic(){
        $valorTotal = 0;
        $limite = count($this->_numero) - 1;
        foreach ($this->_numero as $indice => $valor) {
            if($limite == $indice){
                $valorTotal +=  $valor;
            }else{
                if ($valor == 5) {
                $valorTotal += $valor;
            }else{
            if ($this->_numero[($indice+1)] > $valor) {
                $valorTotal = $valorTotal - $valor;
            }else{$valorTotal = $valorTotal + $valor;}
           }
            }

            
        }
        return $valorTotal;
    }
}