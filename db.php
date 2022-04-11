<?php
//Primera capa de abstraccion: coneccion con la BD.
class DB{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    
    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'movies';
        $this->user = 'root';
        $this->password = 'Kv_8PPiua/p5rKyy';
        $this->charset = 'utf8mb4';
    }

    public function connect(){
        try{
            $connection = 'mysql:host=' . $this->host . ';dbname=' . $this->db .';charset=' . $this->charset;
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                            PDO::ATTR_EMULATE_PREPARES => false];
            $pdo = new PDO($connection,$this->user, $this->password, $options);
            return $pdo;
        }
        catch(PDOException $e){
            print_r("Connection error: ".$e->getMessage());
        }
    }
}

?>