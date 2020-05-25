<?php
    require_once('DBAbstractModel.php');
    
    class Libro extends DBAbstractModel {
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
        private $titulo;
        private $autor;
        private $editorial;
        
        public function get() {	
                $this->query = "
                    SELECT *
                    FROM libros
                    WHERE titulo = :titulo AND autor = :autor";
                $this->parametros['titulo'] = $titulo;
                $this->parametros['autor'] = $autor;
                $this->get_results_from_query();
            
            if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Libro encontrado';
                echo $this->mensaje;
            }
            else {
                $this->mensaje = 'Libro no encontrado';
                echo $this->mensaje;
            }
        }

        # Muestra todos los libros
        public function mostrarLibros() {		
            $this->query = "
                SELECT *
                FROM libros";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

    
        # Crear un nuevo libro
        public function set($user_data = array()) {
            $this->query = "INSERT INTO libros
                                    (titulo, autor, editorial)
                                VALUES
                                (:titulo, :autor, :editorial)";
                $this->parametros['titulo'] = $user_data["titulo"];
                $this->parametros['autor'] = $user_data["autor"];
                $this->parametros['editorial'] = $user_data["editorial"];

                $this->get_results_from_query();
                $this->close_connection();
                $this->mensaje = 'Libro agregado exitosamente';
        }

        # Modificar un libro
        public function edit($user_data=array()) {
            foreach ($user_data as $campo => $valor) {
                $$campo = $valor;
            }
            $this->query = "
                UPDATE libros
                SET nombre=:nombre,
                usuario=:usuario
                WHERE perfil = :perfil
                ";
            $this->parametros['nombre'] = $nombre;
            $this->parametros['usuario'] = $usuario;
            $this->parametros['perfil'] = $perfil;
            
            $this->get_results_from_query();
            //$this->execute_single_query();
            $this->mensaje = 'Usuario modificado';
        }

        # Eliminar un libro
        public function delete($id='') {
            if($id != '') {
            $this->query = "
                DELETE FROM libros
                WHERE id = :id
                ";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Libro eliminado';
        }
    }

        # Método constructor
        function __construct() {
            // $this->db_name = 'libros';
        }
        
        # Método destructor del objeto
        function __destruct() {
        $this->conn = null;
        }

        public function getMensaje(){
            return $this->mensaje;
        }

    }
?>