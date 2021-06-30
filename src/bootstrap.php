<?php

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Dotenv\Dotenv;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use Paw\Core\Router;
use Paw\Core\Config;
use Paw\Core\Request;
use Paw\Core\Database\ConnectionBuilder;

$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
$dotenv->load();

$config = new Config();

$log = new Logger('mvc-app');
$handler = new StreamHandler($config->get("LOG_PATH"));
$handler->setLevel($config->get("LOG_LEVEL"));
$log->pushHandler($handler);


$connectionBuilder = new ConnectionBuilder;
$connectionBuilder->setLogger($log);
$connection = $connectionBuilder->make($config);


$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();


// Load Templates
$loader = new FilesystemLoader(__DIR__ . $config->get("TEMPLATES_DIR"));
$twig = new Environment ($loader, array(
    'cache' => $config->get("TEMPLATES_CACHE_DIR"),
    'debug' => true
));


$request = new Request();

// Rutas
$router = new Router();
$router->setLogger($log);

// Pages
$router->get('/', 'PageController@index');
$router->get('/introduccion', 'PageController@introduccion');
$router->get('/controles', 'PageController@controles');
$router->get('/seleccion', 'PageController@seleccion');
$router->get('/jugar', 'PageController@jugar');
