<?php
# Importar modelo de abstracción de base de datos
require_once('DBAbstractModel.php');
class Usuario extends DBAbstractModel {

    private static $instancia;

    function __construct() {
        $this->open_connection();
        $this->dbh = $this->conn;
        }
        
        public static function singleton()
            {
                if (!isset(self::$instancia)) {
                    $miclase = __CLASS__;
                    self::$instancia = new $miclase;
                }
                return self::$instancia;
            }
            
        public function __clone()
            {
                trigger_error('La clonación no es permitida!.', E_USER_ERROR);
            }

        function __destruct() {
           $this->conn = null;
        }
        

    private $usuario;
    private $nombre;
	private $passwd;

    # Comprueba si existe un usuario
    public function checkExistUser($usuario=''){
        $this->query = "
        SELECT usuario
        FROM usuarios
        WHERE usuario = :usuario";
        $this->parametros['usuario']= $usuario;
        $this->get_results_from_query();
        if(count($this->rows) == 1) {
            return true;
		}
		else {
            return false;
		}
    }

	# Crear un nuevo usuario
	public function setUser($usuario_data=array()) {
        if($this->checkExistUser($usuario_data[0])){
            $this->mensaje = '¡Ya existe un usuario con ese nombre!';
            $this->register = false;
        }
        else {
            $this->query = "INSERT INTO user
            (usuario,nombre, passwd)
            VALUES
            (:usuario, :nombre, :passwd)";
            $this->parametros['usuario']= $usuario_data[0];
            $this->parametros['nombre']= $usuario_data[1];
            $this->parametros['passwd']= $usuario_data[2];
            $this->get_results_from_query();
            $this->mensaje = 'Usuario registrado correctamente';
            $this->register = true;
        }
    }

	# Login de usuarios
	public function getUser($usuario='', $passwd='') {
		
		if($usuario != '' && $passwd != '') {
		$this->query = "
			SELECT usuario, passwd
			FROM usuarios
			WHERE usuario = :usuario AND passwd = :passwd";
        $this->parametros['usuario']= $usuario;
        $this->parametros['passwd']= $passwd;
		$this->get_results_from_query();
		}
		
		if(count($this->rows) == 1) {
			foreach ($this->rows[0] as $propiedad=>$valor) {
				$this->$propiedad = $valor;
			}
            $this->mensaje = 'Usuario encontrado';
            $this->login = true;
		}
		else {
            $this->mensaje = 'Usuario no encontrado';
            $this->login = false;
		}
    }
    

    # Comprueba si existe un bookmark en un usuario
    public function checkExistSerie($usuario='', $bk=''){
        $this->query = "
        SELECT username, bm_url
        FROM bookmark
        WHERE username = :user AND bm_url = :bk";
        $this->parametros['user']= $usuario;
        $this->parametros['bk']= $bk;
        $this->get_results_from_query();
        if(count($this->rows) == 1) {
            return false;
		}
		else {
            return true;
		}
    }

	public function addSerie($usuario='', $bk='') {
        if($this->checkExistBk($usuario, $bk)){
            $this->query = "INSERT INTO bookmark
            (username, bm_url)
            VALUES
            (:user, :bk)";
            $this->parametros['user']= $usuario;
            $this->parametros['bk']= $bk;
            $this->get_results_from_query();
            $this->mensaje = 'Bookmark registrado correctamente';
            $this->bkok = true;
        }
        else {
            $this->bkok = false;
        }
    }

	public function getSerie($usuario='') {
		
		if($usuario != '') {
		$this->query = "
			SELECT titulo
			FROM series
			WHERE usuarios = :user";
        $this->parametros['user']= $usuario;
        $this->get_results_from_query();
        $this->lista = $this->rows;
		}
    }

	public function removeSerie($usuario='', $bk='') {
		if($usuario != '' && $bk != '') {
		$this->query = "
			DELETE
			FROM bookmark
			WHERE username = :user AND bm_url = :bk";
        $this->parametros['user']= $usuario;
        $this->parametros['bk']= $bk;
		$this->get_results_from_query();
		}
    }


}
?>