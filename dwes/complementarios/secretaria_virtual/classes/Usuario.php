<?php
    require_once('DBAbstractModel.php');
    
    class Usuario extends DBAbstractModel {
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
        private $nombre;
        private $email;
        private $usuario;
        private $pass;
        private $estado; // activo, bloqueado, pendiente
        private $perfil; // admin, user

        # Obtiene los datos del usuario pasando la id
        public function getDatos($id='') {
            $this->query = "
                SELECT *
                FROM secre_usuario
                WHERE id = :id
                ";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            return $this->rows;
            $this->close_connection();
            $this->mensaje = 'Datos extraidos';
        }


        # Obtiene los datos un usuario
        public function get($usuario='') {		
        if($usuario != '') {
            $this->query = "
                SELECT *
                FROM secre_usuario
                WHERE usuario = :usuario";
            $this->parametros['usuario'] = $usuario;	
            $this->get_results_from_query();
            $this->close_connection();
        }else {
            $this->mensaje = "Usuario no encontrado";
        }
            return $this->rows;
        }
 

       # Crear un nuevo usuario
        public function set($user_data = array()) { 
                  
            if (sizeof($this->get($user_data['usuario'])) == 1) {
                $this->mensaje = 'El usuario ya existe';
                return;
            }else {
                $this->query = "INSERT INTO secre_usuario
                                    (nombre, email, usuario, pass, estado, perfil)
                                    VALUES
                                    (:nombre, :email, :usuario, :pass, :estado, :perfil)";
                    $this->parametros['nombre'] = $user_data["nombre"];
                    $this->parametros['email'] = $user_data["email"];
                    $this->parametros['usuario'] = $user_data["usuario"];
                    $this->parametros['pass'] = $user_data["pass"];
                    $this->parametros['estado'] = $user_data["estado"];
                    $this->parametros['perfil'] = $user_data["perfil"];
                    $this->get_results_from_query();
                    $this->close_connection();
                    $this->mensaje = 'Usuario agregado exitosamente';
            }
        }

        # Comprueba si el usuario existe
        public function comprobarUsuario($usuario='') {        
                if($usuario != '') {
                $this->query = "
                    SELECT usuario
                    FROM secre_usuario
                    WHERE usuario = :usuario";
                $this->parametros['usuario']= $user_data["usuario"];
                $this->get_results_from_query();
                $this->close_connection();
                $this->mensaje = 'El usuario ya existe';
            }else {
                $this->mensaje = "Usuario no encontrado";
            }
                return $this->rows;
            }

        # Modificar un usuario
        public function edit($user_data=array()) {
            foreach ($user_data as $campo => $valor) {
                $campo = $valor;
            }
            $this->query = "
                UPDATE secre_usuario
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

        # Eliminar un usuario
        public function delete($id='') {
            if($id != '') {
            $this->query = "
                DELETE FROM secre_usuario
                WHERE id = :id
                ";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Usuario eliminado';
            }
        }

      # Busca un usuario
      public function buscarUsuario($busqueda=''){
        if($busqueda!=''){
            $this->query = "SELECT * FROM secre_usuario
            WHERE 
            usuario LIKE :filtro
            ";
            $this->parametros['filtro']="%".$busqueda."%";
        }
        $this->get_results_from_query();
        $this->close_connection();
        return $this->rows;
    }

        # Activar un usuario
        public function activar($id='') {
            if($id != '') {
                $this->query = "
                UPDATE secre_usuario
                SET estado = :estado
                WHERE id = :id
                ";
            $this->parametros['estado'] = "activo";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            } 
        }

        # Bloquear un usuario
        public function bloquear($id='') {
            if($id != '') {
                $this->query = "
                UPDATE secre_usuario
                SET estado = :estado
                WHERE id = :id
                ";
                $this->parametros['estado'] = "bloqueado";
                $this->parametros['id'] = $id;
            $this->get_results_from_query();
            }
        }

        # Muestra todos los usuarios
        public function mostrarUsuariosPendientes() {		
            $this->query = "
                SELECT id, nombre, usuario, estado
                FROM secre_usuario
                WHERE estado = 'pendiente'";
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }

        public function getMensaje(){
            return $this->mensaje;
        }

        # Método constructor
        function __construct() {
            $this->db_name = 'secre_usuario';
        }
        
        # Método destructor del objeto
        function __destruct() {
        $this->conn = null;
        }

    }
?>