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
        

	private $user;
	private $passwd;
	private $perfil;
	protected $id;

	# Crear un nuevo usuario
	public function set($user_data=array()) {		
				$this->query = "INSERT INTO user
								(username, passwd, email)
								VALUES
								(:username, :passwd, :email)";
				$this->parametros['username']= $user_data[0];
				$this->parametros['passwd']= $user_data[1];
				$this->parametros['email']=$user_data[2];
		        $this->get_results_from_query();
			    $this->mensaje = 'Usuario agregado exitosamente';
    }
}
?>