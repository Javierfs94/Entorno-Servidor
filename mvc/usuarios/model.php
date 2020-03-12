<?php
# Importar modelo de abstracción de base de datos
require_once('../app/DBAbstractModel.php');
class Usuario extends DBAbstractModel {
	
	private static $instancia;
	
	private $dbh;
	public $nombre;
	public $apellidos;
	public $email;
	private $clave;
	protected $id;
	# Traer datos de un usuario
	public function get($email='') {
		
		if($email != '') {
		$this->query = "
			SELECT id, nombre, apellidos, email, clave
			FROM usuarios
			WHERE email = :email";
		$this->parametros['email']= $email;	
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

	# Lista de usuarios
	public function lista() {
		$this->query = "
			SELECT nombre, apellidos, email, clave FROM usuarios";
		$this->get_results_from_query();
		
		if(count($this->rows) >= 0) {
			$this->lista = $this->rows;
			$this->mensaje = 'Usuarios encontrados';
		}
		else {
			$this->mensaje = 'Usuarios no encontrados';
		}
	}

	# Crear un nuevo usuario
	public function set($user_data=array()) {
		if(array_key_exists('email', $user_data)) {
			$this->get($user_data['email']);
			
			if($user_data['email'] != $this->email) {
				foreach ($user_data as $campo=>$valor) {
					$$campo = $valor;
                    					
				}
				
				$this->query = "INSERT INTO usuarios
								(nombre, apellidos, email, clave)
								VALUES
								(:nombre, :apellidos, :email, :clave)";
				$this->parametros['nombre']= $nombre;
				$this->parametros['apellidos']= $apellidos;
				$this->parametros['email']=$email;
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
apellidos=:apellidos
WHERE email = :email
";
$this->parametros['nombre']=$nombre;
$this->parametros['apellidos']=$apellidos;
$this->parametros['email']=$email;

$this->get_results_from_query();
//$this->execute_single_query();
$this->mensaje = 'Usuario modificado';
}
# Eliminar un usuario
public function delete($email='') {
$this->query = "
DELETE FROM usuarios
WHERE email = :email
";
$this->parametros['email']=$email;
$this->get_results_from_query();
$this->mensaje = 'Usuario eliminado';
}
# Método constructor
function __construct() {
$this->open_connection();
$this->dbh = $this->conn;
/*
try {
            $this->dbh = new PDO('mysql:host=localhost;dbname=examples', 'root', 'root');
            $this->dbh->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
*/
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
# Método destructor del objeto
function __destruct() {
   $this->conn = null;
}
}
?>