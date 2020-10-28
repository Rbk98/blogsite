<?php 

namespace App\src\controller;

use App\src\repository\ClientRepository;
use App\src\model\Client;

class ClientController 
{
    private $clientRepository;

    public function __construct()
    {
        if (!isset($this->clientRepo)) {
            $this->clientRepository = new ClientRepository;
        }
    }

    public function liste()
    {
        $clients = $this->clientRepository->getClients();
        
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $client = new Client;
            $client->setUsername($_GET['username']);
            $client->setNom($_POST['nom']);
            $client->setPrenom($_POST['prenom']);
            $client->setPassword($_POST['password']);
            $client->setAdmin($_POST['isadmin']);
            $this->postRep->createClient($client);

            header('Location: index.php?page=post&action=liste');
        }

        require('templates/client/inscription.php');
    }

    public function read()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $client = new Client;
            $client->setUsername($_GET['username']);
            $client->setPassword($_POST['password']);
        }

        require('templates/client/connexion.php');
    }

    public function update()
    {

    }
    public function delete()
    {

    }

}
?>