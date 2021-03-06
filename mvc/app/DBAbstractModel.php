<?php
abstract class DBAbstractModel {
	private static $db_host = DBHOST;
	private static $db_user = DBUSER;
	private static $db_pass = DBPASS;
	private static $db_name = DBNAME;
	private static $db_port = DBPORT;
	
	protected $conn; // Manejador de la BD
	//Manejo de consultas.
	protected $query;
	protected $parametros=array();
	protected $rows = array();
	
	public $mensaje ='OK';

    //Metodos abstractos para implementar en los diferentes módulos.
	abstract protected function get();
    abstract protected function set();
	abstract protected function edit();
	abstract protected function delete();
    
	#Crear conexión a la base de datos.
    protected function open_connection()
	{
	    $dsn = 'mysql:host=' . self::$db_host . ';'
							 . 'dbname=' . self::$db_name . ';' 
							 . 'port='  . self::$db_port;
        try {
		  $this->conn = new PDO($dsn, self::$db_user, self::$db_pass,
		                       array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		  return $this->conn;
		} 
		catch (PDOException $e) {
          printf("Conexión fallida: %s\n", $e->getMessage());
          exit();
      }
	}

	# Desconectar la base de datos
	private function close_connection() {
		$this->conn=null;
	}
	# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
	protected function execute_single_query() {
		if($_POST) {
			//$this->open_connection();
			$this->conn->query($this->query);
			self:$this->close_connection();
		} 
		else {
			$this->mensaje = 'Metodo no permitido';
		}
	}
	# Traer resultados de una consulta en un Array
	protected function get_results_from_query() 
	{
	  //$this->open_connection();
	
	  $_result = false;
      if (($_stmt = $this->conn->prepare($this->query))) {
		 if (preg_match_all('/(:\w+)/', $this->query, $_named, PREG_PATTERN_ORDER)) {
     		$_named = array_pop($_named);
			foreach ($_named as $_param) {
               $_stmt->bindValue($_param, $this->parametros[substr($_param, 1)]);
            }
         }
     
      try {
         if (! $_stmt->execute()) {
            printf("Error de consulta: %s\n", $_stmt->errorInfo()[2]);
         }
         //$_result = $_stmt->fetchAll(PDO::FETCH_ASSOC);
         $this->rows = $_stmt->fetchAll(PDO::FETCH_ASSOC);

         $_stmt->closeCursor();
      } 
	  catch(PDOException $e){
            printf("Error en consulta: %s\n" , $e->getMessage());
      }
    }
    
    //return $_result;
   }
	/*
		$this->open_connection();
		$result = $this->conn->query($this->query);
		print_r($result);
		while ($this->rows[] = $result->fetch_array());
		$result->close();
		$this->close_connection();
		array_pop($this->rows);
	
	}*/
}
?>