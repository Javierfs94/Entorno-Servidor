<?php
    require_once('DBAbstractModel.php');
    
    class Prestamo extends DBAbstractModel {
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
        private $id_usuario;
        private $id_libro;
        private $prestado;
        private $devuelto;

        # Obtiene un usuario
        public function get($usuario='') {		
        if($usuario != '') {
            $this->query = "
                SELECT *
                FROM usuarios
                WHERE usuario = :usuario";
            $this->parametros['usuario']= $usuario;	
            $this->get_results_from_query();
            $this->close_connection();
        }else {
            $this->mensaje = "Usuario no encontrado";
        }
            return $this->rows;
        }

        # Crear un nuevo prestamo
        public function set($user_data = array()) {        
                    $this->query = "INSERT INTO prestamos
                                    (id_usuario, id_libro, prestado)
                                    VALUES
                                    (:id_usuario, :id_libro, :prestado)";
                    $this->parametros['id'] = $user_data["id"];
                    $this->parametros['id_usuario'] = $user_data["id_usuario"];
                    $this->parametros['id_libro'] = $user_data["id_libro"];
                    $this->parametros['prestado'] = $user_data["prestado"];
                    $this->get_results_from_query();
                    $this->close_connection();
        }

 

       # Modificar un usuario
       public function edit($user_data=array()) {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "
            UPDATE usuarios
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

        # Eliminar un usuario
        public function delete($id='') {
        
        }

        public function getMensaje(){
            return $this->mensaje;
        }

        # Método constructor
        function __construct() {
            $this->db_name = 'usuarios';
        }
        
        # Método destructor del objeto
        function __destruct() {
        $this->conn = null;
        }

    }
?>