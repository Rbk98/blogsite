<?php

namespace App\src\config;

use App\src\controller\ClientController;
use App\src\controller\PostController;
use App\src\controller\DefaultController;
use App\src\controller\CompteController;


class Router
{
    public function loadRoutes()
    {


        try {
            if(!isset($_GET['action'])){
                $controller = new DefaultController;
                $controller->home();
                exit;
            }
            
            $action = $_GET['action'];
            if (isset($_GET['page']) && $_GET['page']  === 'post') {
                $controller = new PostController;
            } elseif (isset($_GET['page']) && $_GET['page'] === 'client') {
               $controller = new ClientController;
            }
            $controller->{$action}();
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
            die;
            
            throw new \Exception('An error occured');
        }
    }
}
