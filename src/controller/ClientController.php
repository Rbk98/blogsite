<?php 
namespace App\src\controller;

use App\src\repository\ClientRepository;
use App\src\model\Client;
use App\src\config\Session;


class ClientController 
{
    private $clientRepository;
    private $session;

    public function __construct()
    {
        if (!isset($this->session)) {            
            $this->session = new Session;
        }

        if (!isset($this->clientRepository)) {
            $this->clientRepository = new ClientRepository;
        }
    }

    public function liste()
    {
        $client = $this->clientRepository->getClients();
        
    }

    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $client = new Client;
            $client->setUsername($_POST['username']);
            $client->setNom($_POST['nom']);
            $client->setPrenom($_POST['prenom']);
            $client->setMail($_POST['mail']);
            $client->setPassword(password_hash($_POST['password'],PASSWORD_DEFAULT));
            $this->clientRepository->insertClient($client);

            header('Location: ?page=post&action=liste');
        }

        require('templates/inscription.php');
    }

    public function connect()
    {

        if($this->session->get('username'))
            header('Location: ?page=post&action=liste');

        if(isset($_POST['connexion'])){
            $client = new Client;
            $client->setUsername($_POST['username']);
            $client->setPassword($_POST['password']);

            if(($this->clientRepository->verifPassword($client))){
                $this->clientRepository->connexionClient($client);
                
                $clientInfo = $this->clientRepository->getClientByUsername($client->getUsername());
                $client->setId($clientInfo[0]['id']);

                $this->session->set('username', $client->getUsername());
                $this->session->set('id_client', $client->getId());
                $this->session->set('id', $client->getId());


                header('Location: ?page=post&action=liste');
            }
            
            $this->session->set('error', "Votre identifiant ou votre mot de passe est incorrect");
        }

        require('templates/connexion.php');
    }


    public function profil()
    {

        if(!($this->session->get('username')))
            header('Location: ?page=post&action=liste');

        if(isset($_SESSION['id'])){
            $clients = $this->clientRepository->getClientsbyId($_SESSION['id']);

        }
        require_once('templates/moncompte.php');
    }

    public function deconnexion()
    {
        require 'templates/deconnexion.php';
        
        if (isset($_POST['deconnexion'])){
            $this->session->stop();
        }
        
    }

}
?>