<?php require_once 'vendor/autoload.php';

require_once 'Router.php';

use App\Router;




$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$router = new Router($requestUri, $requestMethod);
$router->route();
