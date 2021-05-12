<?php 

// Pour utiliser MainController
require __DIR__ . '/controllers/MainController.php';
require __DIR__ . '/controllers/ErrorController.php';

$routes = [

  '/' => [
    'controller' => 'MainController',
    'method' => 'home'
  ],

  '/store' => [
    'controller' => 'MainController',
    'method' => 'store'
  ],

  '/products' => [
    'controller' => 'MainController',
    'method' => 'products'
  ],

  '/about' => [
    'controller' => 'MainController',
    'method' => 'about'
  ],

    //TODO ATENTION LE CONTROLLER ErrorController n'EXISTE PAS 
  '404' => [
    'controller' => 'ErrorController',
    'method' => 'notFound'
  ]

];
if(isset($_GET['page'])){
  $requestedPage = $_GET['page'];
} else {
  $requestedPage = '/';
}

if(isset($routes[$requestedPage])){
$controllerName = $routes[$requestedPage]['controller'];
$methodName = $routes[$requestedPage]['method'];

$controller = new $controllerName();

$controller->$methodName();

} else {
  header("HTTP/1.0 404 Not found");
  $errorController = new ErrorController();
  $methodName = $routes['404']['method'];
  $errorController->$methodName();

}


?>