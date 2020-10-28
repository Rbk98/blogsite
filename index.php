<?php

use App\src\config\Router;

require_once "vendor/autoload.php";

session_start();

$router = new Router();
$router->loadRoutes();

?>