<?php
class DBHandler {
    private static $db;
    private static $DBHandler;
    private function __construct() {
        $this->connect_database();
    }

    public static function getInstance() {
        if(self::$DBHandler == null){
            self::$DBHandler=new DBHandler;
        }
        return self::$db;  
    }
    
    private static function connect_database() {
        define('USER', 'root');
        define('PASSWORD', '3ys+ybJLy8n?ugLq-js5d_rBFzawsvcLaQ8JGJudRqtqpkBj=s');
        // Database connection
        try {
            $connection_string = 'mysql:host=localhost;dbname=dbrecensione;charset=utf8';
            $connection_array = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );

            self::$db = new PDO($connection_string, USER, PASSWORD, $connection_array);
        }
        catch(PDOException $e) {
            self::$db = null;
        }
    } 
}
