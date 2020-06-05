<?php
    require_once('DBAbstractModel.php');
    
    class ClaveFirma extends DBAbstractModel {
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
        private $idUsuario;
        private $fila;
        private $columna;
        private $valor;
        
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


        # Genera la clave para un usuario
        public function set($idUsuario, $fila, $columna, $valor) {        
        $this->query = "INSERT INTO secre_clavefirma
                        (idUsuario, fila, columna, valor)
                        VALUES
                        (:idUsuario, :fila, :columna, :valor)";
        $this->parametros['idUsuario'] = $idUsuario;
        $this->parametros['fila'] = $fila;
        $this->parametros['columna'] = $columna;
        $this->parametros['valor'] = $valor;
        $this->get_results_from_query();
        $this->close_connection();
        $this->mensaje = 'Claves generadas exitosamente';
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

        # Muestra las claves de un usuario
        public function mostrarClaves($id=''){
            $this->query = "
            SELECT secre_clavefirma.* FROM secre_clavefirma, secre_usuario WHERE 
            secre_usuario.id=:id
            ";
            $this->parametros['id'] = $id;
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