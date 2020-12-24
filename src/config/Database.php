<?php
namespace App\src\config;


class Database
{
    private $connection;
    
    public function getConnection(){

        try {
            $this->connection = new \PDO('mysql:host=localhost;dbname=avenoel', 'rbk98', 'devweb20', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            return $this->connection;
            
        
        } catch (\PDOException $exception) {
            die('Connexion échouée : ' . $exception->getMessage());
        }
        
    }

    public function checkConnection()
    {
        if(!isset($this->connection)){

            return $this->getConnection();
        }

        return $this->connection;
    }
}

?>