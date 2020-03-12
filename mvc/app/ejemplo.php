<?php
abstract class abstracta{
	protected static $pdo="default abstracta" ;
	function __construct() {
		self::$pdo = 'localhost';
	}
	function conectar() {
		self::$pdo = "conectada";
		return self::$pdo;
	}
}
class prueba extends abstracta {
	private $conexion="default";
	function __construct() {
		parent::__construct();
		echo self::$pdo;
		echo "---";
		echo $this->conectar();
	}

	public function getmensaje() {
	
		return $this->conexion;
	}
}
$p = new prueba();
echo $p->getmensaje();


