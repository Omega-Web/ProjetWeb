<?php
namespace Code\Infrastructure;

use PDO;
use PDOException;

class Database {
    private function __contruct() {

    }
    private static $con;

    public static function get(){
        // Variables logi

       echo "DESSERE";

        //echo 'scc';
        if (!self::$con){
            try {
                self::$con = new PDO('mysql:host=localhost:8889,dbname=videotheque', 'root', 'root');
                self::$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$con->exec('SET NAMES "utf8"');
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$con;
    }

    private function __construct(){

    }
}