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

        private $nombre;
       /*  private $apellidos;
        private $email; */
        private $usuario;
        private $perfil;
        private $clave;
        private $id;

        public function get($usuario='') {
		
            if($usuario != '') {
            $this->query = "
                SELECT id, nombre, usuario, perfil, clave
                FROM usuarios
                WHERE usuario = :usuario";
            $this->parametros['usuario']= $usuario;	
            $this->get_results_from_query();
            }
            
            if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->mensaje = 'Usuario encontrado';
            }
            else {
                $this->mensaje = 'Usuario no encontrado';
            }
        }
    
        # Crear un nuevo usuario
        public function set($user_data=array()) {
            if(array_key_exists('id', $user_data)) {
                $this->get($user_data['id']);
                if($user_data['id'] != $this->id) {
                    foreach ($user_data as $campo=>$valor) {
                        $$campo = $valor;
                    }
                    
                    $this->query = "INSERT INTO usuarios
                                    (nombre, usuario, perfil, clave)
                                    VALUES
                                    (:nombre, :usuario, :perfil, :clave)";
                    $this->parametros['nombre']= $nombre;
                    $this->parametros['usuario']= $usuario;
                    $this->parametros['perfil']=$perfil;
                    $this->parametros['clave']=$clave;
                    $this->get_results_from_query();
                    //$this->execute_single_query();
                    $this->mensaje = 'Usuario agregado exitosamente';
                } else {
                    $this->mensaje = 'El usuario ya existe';
                }
            } else {
                $this->mensaje = 'No se ha agregado al usuario';
            }
        }

        # Modificar un usuario
        public function edit($user_data=array()) {
            foreach ($user_data as $campo=>$valor) {
                $$campo = $valor;
            }
            $this->query = "
                UPDATE usuarios
                SET nombre=:nombre,
                usuario=:usuario
                WHERE perfil = :perfil
                ";
            $this->parametros['nombre']=$nombre;
            $this->parametros['usuario']=$usuario;
            $this->parametros['perfil']=$perfil;
            
            $this->get_results_from_query();
            //$this->execute_single_query();
            $this->mensaje = 'Usuario modificado';
        }

        # Eliminar un usuario
        public function delete($perfil='') {
            $this->query = "
                DELETE FROM usuarios
                WHERE perfil = :perfil
                ";
            $this->parametros['perfil']=$perfil;
            $this->get_results_from_query();
            $this->mensaje = 'Usuario eliminado';
        }

        # Método constructor
        function __construct() {
            $this->db_name = 'book_example';
        }
        
        # Método destructor del objeto
        function __destruct() {
        $this->conn = null;
        }

    }
?>