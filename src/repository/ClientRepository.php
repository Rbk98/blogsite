<?php 

namespace App\src\repository;

use App\src\config\Database;
use App\src\model\Client;

class ClientRepository
{
    public function getClients()
    {
        $database = new Database();
        $connection = $database->checkConnection();
        
        $result = $connection->query('SELECT * FROM client');

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertClient(Client $client)
    {
        $hash = password_hash($client->getPassword(), PASSWORD_DEFAULT);
        $client->setPassword($hash);
        $database = new Database();
        $db = $database->checkConnection();
        $result = $db->prepare('INSERT INTO client (id, username, mail, nom, prenom, password, isadmin, last_connection_at) VALUES (:id, :username, :mail, :nom, :prenom, :password, :isadmin, :last_connection_at');
        $result->bindValue(':id', $client->getId(), \PDO::PARAM_INT);
        $result->bindValue(':username', $client->getUsername(), \PDO::PARAM_STR);
        $result->bindValue(':mail', $client->getMail(), \PDO::PARAM_STR);
        $result->bindValue(':nom', $client->getNom(), \PDO::PARAM_STR);
        $result->bindValue(':prenom', $client->getPrenom(), \PDO::PARAM_STR);
        $result->bindValue(':password',$client->getPassword() ,\PDO::PARAM_STR);
        $result->bindValue(':isadmin',  $client->getAdmin(), \PDO::PARAM_INT);
        $result->execute();
    }


    public function connexionClient(Client $client){
        $database = new Database();
        $db = $database->checkConnection();
        $query = $db->prepare("UPDATE client SET last_Connection_At = :lastConnect WHERE username = :username");
        $date = ['last_Connection_At' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'))),
        'username' => $client->getUsername()
        ];
        $query->execute($date);
    }

    //SOLID : une fonctionnalité par function

    public function verifPassword(Client $client){

        $database = new Database();
        $db = $database->checkConnection();
        $query = $db->prepare('SELECT password FROM client WHERE username = :username');

        $query->bindParam(':username', $_POST["username"]);
        $query->execute();
        $result = $query->fetch();

        return password_verify($client->getPassword(), $result);
        // jsp si c'est bon de mettre juste $result ?
    }
}