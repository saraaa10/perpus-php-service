<?php

use FastRoute\RouteCollector;
use Illuminate\Database\Capsule\Manager as Capsule;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use League\Plates\Engine;
use League\Plates\Template\Folders;
use Prana\PerpusPhpService\Presentation\Controllers\BookController;

// Load Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Create a database connection
$databaseConfig = include __DIR__ . '/../config/database.php';

// Create the container
$container = require __DIR__ . '/../config/dependencies.php';

// Set up database connection
$capsule = new Capsule;
$capsule->addConnection($databaseConfig);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Set up the Plates template engine
$plates = new Engine(__DIR__ . '/../templates');

// Set up routing
$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->get('/books', [BookController::class, 'index']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// Dispatch the request
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // Handle 404 Not Found
        echo '404 Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // Handle 405 Method Not Allowed
        $allowedMethods = $routeInfo[1];
        echo '405 Method Not Allowed';
        break;
    case FastRoute\Dispatcher::FOUND:
        // Handle route found
        [$controller, $method] = explode('@', $routeInfo[1]);
        $controllerInstance = new $controller();
        $controllerInstance->$method();
        break;
}