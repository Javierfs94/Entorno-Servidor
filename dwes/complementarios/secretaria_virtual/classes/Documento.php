<?php
    require_once('DBAbstractModel.php');
    
    class Documento extends DBAbstractModel {
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
        private $descripcion;
        private $fichero;
        private $estado;
        private $fechaFirma;

        # Obtiene un usuario
        public function get($usuario='') {		
        if($usuario != '') {
            $this->query = "
                SELECT *
                FROM bib_usuarios
                WHERE usuario = :usuario";
            $this->parametros['usuario']= $usuario;	
            $this->get_results_from_query();
            $this->close_connection();
        }else {
            $this->mensaje = "Usuario no encontrado";
        }
            return $this->rows;
        }

        # Sube un documento
        public function set($user_data = array()) {        
            $this->query = "INSERT INTO secre_documentos
                            (idUsuario, descripcion, fichero)
                            VALUES
                            (:idUsuario, :descripcion, :fichero)";
            $this->parametros['idUsuario'] = $user_data["idUsuario"];
            $this->parametros['descripcion'] = $user_data["descripcion"];
            $this->parametros['fichero'] = $user_data["fichero"];
            $this->parametros['estado'] = "pendiente";
            $this->get_results_from_query();
            $this->close_connection();
        }

        # Muestra los documentos de un usuario
        public function mostrarDocumentos($id=''){
            $this->query = "
            SELECT secre_documentos.* FROM secre_documentos, secre_usuario WHERE 
            secre_usuario.id=:id
            ";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->close_connection();
            return $this->rows;
        }


       # Modificar un usuario
       public function edit($user_data=array()) {
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "
            UPDATE bib_usuarios
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
        
        }

        public function getMensaje(){
            return $this->mensaje;
        }

        # Método constructor
        function __construct() {
            $this->db_name = 'bib_usuarios';
        }
        
        # Método destructor del objeto
        function __destruct() {
        $this->conn = null;
        }

    }
?>