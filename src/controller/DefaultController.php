<?php 

namespace App\src\controller;

use App\src\Repository\ClientRepository;

class DefaultController
{
    public function home()
    {
        require 'templates/home.php';
    }
}