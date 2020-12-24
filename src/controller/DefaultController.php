<?php 

namespace App\src\controller;

use App\src\repository\ClientRepository;

class DefaultController
{
    public function home()
    {
        require 'templates/home.php';
    }
}