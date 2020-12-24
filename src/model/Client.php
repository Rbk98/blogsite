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
    private $isadmin = 0;
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
        return (int) $this->isadmin;
    }

    public function getLastConnection()
    {
        return $this->last_connection_at;
    }


    
    public function setId($id)
    {
        $this->id =$id;
    }

    public function setUsername($username)
    {
       $this->username = $username;
    }

    public function setMail($mail)
    {
        $this->mail =$mail;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setLastConnection()
    {
        return $this->last_connection_at;
    }

}
?>