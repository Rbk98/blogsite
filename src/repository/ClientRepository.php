<?php 
namespace App\src\repository;

use App\src\config\Database;
use App\src\model\Client;

class ClientRepository
{
    public function getClients()
    {
        $database = new Database;
        $connection = $database->checkConnection();
        
        $result = $connection->query('SELECT * FROM client');

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertClient(Client $client)
    {
        $database = new Database;
        $db = $database->checkConnection();

        $result = $db->prepare('INSERT INTO client (username, mail, nom, prenom, password, isadmin, last_connection_at)  VALUES (:username, :mail, :nom, :prenom, :password, :isadmin, :last_connection_at)');
        $result->bindValue(':username', $client->getUserName(), \PDO::PARAM_STR);
        $result->bindValue(':mail', $client->getMail(), \PDO::PARAM_STR);
        $result->bindValue(':nom', $client->getNom(), \PDO::PARAM_STR);
        $result->bindValue(':prenom', $client->getPrenom(), \PDO::PARAM_STR);
        $result->bindValue(':password', $client->getPassword(), \PDO::PARAM_STR);
        $result->bindValue(':isadmin', $client->getAdmin(), \PDO::PARAM_INT);
        $result->bindValue(':last_connection_at', date('Y-m-d H:i:s'), \PDO::PARAM_STR);
        
        $result->execute();
    }


    public function getClientByUsername($username)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->prepare('SELECT * FROM `client` WHERE username = :username');
        $result->bindValue(':username', $username, \PDO::PARAM_STR);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function getClientsbyId(int $id_client)
    {
        $database = new Database;
        $db = $database->checkConnection();
        $result = $db->query("SELECT * FROM client WHERE id=$id_client");

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function connexionClient(Client $client){
        $database = new Database;
        $db = $database->checkConnection();

        
        $query = $db->prepare("UPDATE client SET last_Connection_At = :lastConnect WHERE username = :username");
        $data = [
            'lastConnect' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'))),
            'username' => $client->getUsername(),
        ];
        $query->execute($data);
    }

    //SOLID : une fonctionnalité par function

    public function verifPassword(Client $client){

        $database = new Database;
        $db = $database->checkConnection();
        $query = $db->prepare('SELECT password FROM client WHERE username = :username');

        $query->bindParam(':username', $_POST["username"]);
        $query->execute();
        $result = $query->fetch();

        $isPasswordCorrect = password_verify($client->getPassword(), $result['password']);
        return ($isPasswordCorrect!= null);

    }
}