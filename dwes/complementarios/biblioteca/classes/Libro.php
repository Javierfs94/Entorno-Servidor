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
                    FROM bib_libros
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
                FROM bib_libros";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

    
        # Crear un nuevo libro
        public function set($user_data = array()) {
            $this->query = "INSERT INTO bib_libros
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
                UPDATE bib_libros
                SET nombre=:nombre,
                usuario=:usuario
                WHERE perfil = :perfil
                ";
            $this->parametros['nombre'] = $nombre;
            $this->parametros['usuario'] = $usuario;
            $this->parametros['perfil'] = $perfil;
            
            $this->get_results_from_query();
            $this->mensaje = 'Usuario modificado';
        }

        # Reserva un libro
        public function reservarLibro($id='') {
            $this->query = "
                UPDATE bib_libros
                SET estado=:estado
                WHERE id = :id
                ";
            $this->parametros['estado'] = "reservado";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Libro actualizado';
        }

        # Devuelve un libro
        public function devolverLibro($id='') {
            $this->query = "
                UPDATE bib_libros
                SET estado=:estado
                WHERE id = :id
                ";
            $this->parametros['estado'] = "disponible";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Libro actualizado';
        }

        # Busca un libro
        public function buscarLibro($busqueda=''){
            if($busqueda!=''){
                $this->query = "SELECT * FROM bib_libros
                WHERE 
                titulo LIKE :filtro or
                autor LIKE :filtro or
                editorial LIKE :filtro
                ";
                $this->parametros['filtro']="%".$busqueda."%";
            }
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

        # Eliminar un libro
        public function delete($id='') {
            if($id != '') {
            $this->query = "
                DELETE FROM bib_libros
                WHERE id = :id
                ";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Libro eliminado';
        }
    }

        # Método constructor
        function __construct() {
            // $this->db_name = 'bib_libros';
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