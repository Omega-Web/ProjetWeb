<?php

Use Code\Model\User;

class Authentification {

     $con;

    public function __contruct() {

    }

    public static function get(){
        // Variables logi

        //echo 'scc';
        if (!self::$con){
            try {
                
                // self::$con = new PDO('mysql:host=localhost:8889,dbname=videotheque', 'admin_videotheque', 'admin_videotheque');
                self::$con = new PDO('mysql:host=localhost;port=3308;dbname=videotheque', 'root', '');
                self::$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$con->exec('SET NAMES "utf8"');
                
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$con;
    }
}