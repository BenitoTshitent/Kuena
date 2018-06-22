<?php

class Config
{
    static function getConnexion() {

        try {
            if(!defined('DB_HOST')) define('DB_HOST','localhost');
            if(!defined('DB_USER')) define('DB_USER','root');
            if(!defined('DB_PASSWORD')) define('DB_PASSWORD','');
            if(!defined('DB_NAME')) define('DB_NAME','kna_kuenea');
            if(!defined('DB_DNS')) define('DB_DNS','mysql:host='.DB_HOST.';dbname='.DB_NAME);
            $Bdd = new PDO(DB_DNS, DB_USER, DB_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch(Exception $e) {
            die('Error : '.$e->getMessage());
        }
        return $Bdd;
    }
}
