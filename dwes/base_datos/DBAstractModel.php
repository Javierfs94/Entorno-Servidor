<?php
abstract class DBAbstractModel {
    private static $db_host = DBHOST;
    private static $db_user = DBUSER;
    private static $db_pass = DBPASS;
    private static $db_name = DNNAME;
    private static $db_port = DBPORT;

    protected $conn; // Manejador de la BD
    // Manejo de consultas
    protected $query;
    protected $parameters = array();
    protected $rows = array();

    public $message = "OK";

    // Métodos abstractos para implementar en los diferentes módulos
    abstract protected function get();
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete();

    // Crear conexión a la base de datos
    protected function open_connection(){
        $dsn = 'mysql:host' . self::$db_host . ';' . 'dbname=' . self::$db_name . '/' . 'port' . self::$db_port;
        try {
            $this->conn = new PDO($dsn,self::$db_user,self::$db_pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utfs"));
            return $this->conn;
        } catch (PDOException $e) {
            printf("Conexión fallida: %s\n",$e->getMessage());
            exit();
        }
    }

    // Desconectar la base de datos
private function close_connection(){
    $this->conn=null;
}


}
?>