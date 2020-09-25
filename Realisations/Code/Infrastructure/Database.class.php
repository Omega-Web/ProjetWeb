<?php
namespace Code\Infrastructure;

use PDO;
use PDOException;


//classe static permettant de recuperer une connecion avec la base de données
class Database {

    private static $con;

    private function __contruct() {

    }

    public static function get(){

        //si la connection n'existe pas la creer sinon la renvoyer
        if (!self::$con){
            try {
                
                // self::$con = new PDO('mysql:host=localhost:8889,dbname=videotheque', 'admin_videotheque', 'admin_videotheque');
<<<<<<< HEAD
                self::$con = new PDO('mysql:host=localhost;port=3307;dbname=videotheque', 'root', 'root');
=======
                self::$con = new PDO('mysql:host=localhost;port=3308;dbname=videotheque', 'root', '');
>>>>>>> Dev
                self::$con->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$con->exec('SET NAMES "utf8"');
                
            } catch (PDOException $e) {

                //TODO mettre en systeme de log
                die($e->getMessage());
            }
        }
        return self::$con;
    }

}