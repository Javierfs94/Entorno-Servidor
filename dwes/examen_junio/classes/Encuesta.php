<?php
    require_once('DBAbstractModel.php');
    
    class Encuesta extends DBAbstractModel {
        private static $instancia;
        public static function singleton() {
            if (!isset(self::$instancia)) {
                $miClase = __CLASS__;
                self::$instancia = new $miClase;
            }
            return self::$instancia;
        }

        public function __clone() {
            trigger_error('La clonación no es permitida.', E_USER_ERROR);
        }

        private $id;
        private $Titulo;
        private $fechaHoraInicio;
        private $fechaHoraFinal;

        # Obtiene los datos de las encuestas
        public function getDatos() {
            $this->query = "
            SELECT * FROM encuestas WHERE fechaHoraInicio < NOW() 
            AND fechaHoraFinal > NOW()
                ";
            $this->get_results_from_query();
            return $this->rows;
            $this->close_connection();
            $this->mensaje = 'Datos extraidos';
        }


   # Crear una nueva encuesta
   public function setEncuesta($user_data = array()) {                 
    $this->query = "
    INSERT INTO encuestas (Titulo, fechaHoraInicio, fechaHoraFinal) 
    VALUES (:Titulo, :fechaHoraInicio, :fechaHoraFinal) 
    ";
        $this->parametros['Titulo'] = $user_data["Titulo"];
        $this->parametros['fechaHoraInicio'] = $user_data["fechaHoraInicio"];
        $this->parametros['fechaHoraFinal'] = $user_data["fechaHoraFinal"];
        $this->get_results_from_query();
        $this->close_connection();
        $this->mensaje = 'Encuesta agregada exitosamente';
    }


    public function setPregunta($idEncuesta, $pregunta) {                 
        $this->query = "
        INSERT INTO encuestas_preguntas (idEncuesta, pregunta) 
        VALUES (:idEncuesta, :pregunta);
        ";
            $this->parametros['idEncuesta'] = $idEncuesta;
            $this->parametros['pregunta'] = $pregunta;
            $this->get_results_from_query();
            $this->close_connection();
            $this->mensaje = 'Pregunta agregada exitosamente';
        }

      # Obtiene los datos de las preguntas de la encuesta
      public function getPreguntas($idEncuesta='') {
        $this->query = "
            SELECT * FROM encuestas_preguntas 
            WHERE idEncuesta = :idEncuesta
            ";
        $this->parametros['idEncuesta'] = $idEncuesta;
        $this->get_results_from_query();
        return $this->rows;
        $this->close_connection();
        $this->mensaje = 'Datos extraidos';
    }

    # Crear una nueva respuesta
    public function setRespuestas($user_data = array()) {                 
        $this->query = "
        INSERT INTO encuestas_respuestas (idEncuestaPregunta, Valor) 
        VALUES (:idEncuestaPregunta,:Valor)
        ";
            $this->parametros['idEncuestaPregunta'] = $user_data["idEncuestaPregunta"];
            $this->parametros['Valor'] = $user_data["Valor"];
            $this->get_results_from_query();
            $this->close_connection();
            $this->mensaje = 'Encuesta respondida agregada exitosamente';
    }


        public function getMensaje(){
            return $this->mensaje;
        }

        # Método constructor
        function __construct() {
            $this->db_name = 'encuestas';
        }
        
        # Método destructor del objeto
        function __destruct() {
        $this->conn = null;
        }

    }
?>