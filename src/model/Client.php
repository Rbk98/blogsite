<?php
namespace App\src\model;

require_once('vendor\autoload.php');

use App\src\config\Database;

class Client
{
    private $id;
    private $username;
    private $mail;
    private $nom;
    private $prenom;
    private $password;
    private $isadmin;
    private $last_connection_at;


    public function getClient()
    {
        $database = new Database;
        $db = $database->getConnection();
        $result = $db->query('SELECT * FROM client');
        return $result->fetchAll();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getAdmin()
    {
        return $this->isadmin;
    }

    public function getLastConnection()
    {
        return $this->last_connection_at;
    }


    
    public function setId()
    {
        return $this->id;
    }

    public function setUsername()
    {
        return $this->username;
    }

    public function setMail()
    {
        return $this->mail;
    }

    public function setNom()
    {
        return $this->nom;
    }

    public function setPrenom()
    {
        return $this->prenom;
    }

    public function setPassword()
    {
        return $this->password;
    }

    public function setAdmin()
    {
        return $this->isadmin;
    }

    public function setLastConnection()
    {
        return $this->last_connection_at;
    }

}
?>