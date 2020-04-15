<?php
class Serie{
    private $_titulo;
    private $_plataforma;
    private $_temporadas;
    private $_idiomas = array();
    private $_lanzamiento;

    public function __construct($titulo, $plataforma, $temporadas, $idiomas, $lanzamiento ){
        $this->_titulo = $titulo;
        $this->_plataforma = $plataforma;
        $this->_temporadas = $temporadas;
        $this->_idiomas = $idiomas;
        $this->_lanzamiento = $lanzamiento;
    }

    public function getTitulo(){
        return $this->_titulo;
    }

    public function getPlataforma(){
        return $this->_plataforma;
    }

    public function getTemporadas(){
        return $this->_temporadas;
    }

    public function getIdiomas(){
        return $this->_idiomas;
    }
    
    public function getLanzamiento(){
        return $this->_lanzamiento;
    }

    public function __toString()
    {
      return "Nombre: ".$this->_titulo .
      "<br> Plataforma: ". $this->_plataforma.
      "<br> Temporadas: ". $this->_temporadas.
      "<br> Idiomas: ". $this->_idiomas.
      "<br> Lanzamiento: ". $this->_lanzamiento;
    }
}
?>